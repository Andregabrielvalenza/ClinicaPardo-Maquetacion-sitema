<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conductor;
use App\Programacion;
use App\Recepcion;
use App\Residuo;
use App\SucursalCliente;
use App\Transporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Carbon\Carbon;

class ProgramacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:programacione-list', ['only' => ['index','show']]);
        $this->middleware('permission:programacione-create', ['only' => ['create','store','getsucursales','clonar']]);
        $this->middleware('permission:programacione-edit', ['only' => ['edit','update','getsucursales']]);
        $this->middleware('permission:programacione-delete', ['only' => ['destroy']]);
        $this->middleware('permission:programacione-procesar', ['only' => ['procesar','registrarrecepcion']]);
        $this->middleware('permission:manifiesto-create', ['only' => ['almacen']]);
    }

    public function getsucursales(Request $request)
    {
        $html = '';
        if (!$request->cliente_id) {
            $html = '<option value="">Seleccionar direccion</option>';
        } else {
            $sucursales = SucursalCliente::where('cliente_id', $request->cliente_id)->get();
            foreach ($sucursales as $sucursal) {
                $html .= '<option value="'.$sucursal->id.'">'.$sucursal->direccion.' '.$sucursal->numero.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function index()
    {
        $data = Programacion::where('estado',0)->get();
        return view('inicio',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=Cliente::pluck('razon_social','id')->all();
        //$transportes=Transporte::where('ruta','Dentro de Cusco')->pluck('full_data','id')->all();
        $transportes=Transporte::where('ruta','Dentro de Cusco')->select("id", DB::raw("CONCAT(transportes.marca,' ',transportes.modelo,' ',transportes.tipo_vehiculo,' ',transportes.placa) as full_name"))
            ->pluck('full_name','id')->all();
        //dd($transportes);
        $conductores=Conductor::pluck('nombres','id')->all();
        return view('editor.programacion.create', compact('clientes','transportes','conductores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'hora' => 'required',
            'cliente_id' => 'required|integer',
            'transporte_id' => 'required|integer',
            'conductor_id' => 'required|integer'
        ]);

        $input = $request->all();

        $progra = Programacion::create($input);

        return redirect()->route('programaciones.index')
            ->with('success','La programacion se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programacion = Programacion::find($id);
        $clientes=Cliente::pluck('razon_social','id')->all();
        //$transportes=Transporte::where('ruta','Dentro de Cusco')->pluck('full_data','id')->all();
        $transportes=Transporte::where('ruta','Dentro de Cusco')->select("id", DB::raw("CONCAT(transportes.marca,' ',transportes.modelo,' ',transportes.tipo_vehiculo,' ',transportes.placa) as full_name"))
            ->pluck('full_name','id')->all();
        $sucursales=SucursalCliente::where('cliente_id',$programacion->cliente_id)->select("id", DB::raw("CONCAT(sucursales_cliente.direccion,' ',sucursales_cliente.numero) as full_sucursal"))
            ->pluck('full_sucursal','id')->all();
        $conductores=Conductor::pluck('nombres','id')->all();
        return view('editor.programacion.edit',compact('programacion','clientes','transportes','conductores','sucursales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'hora' => 'required',
            'cliente_id' => 'required|integer',
            'transporte_id' => 'required|integer',
            'conductor_id' => 'required|integer',
            'sucursal_id' => 'required|integer'
        ]);

        $input = $request->all();
        $programacion = Programacion::find($id);
        $programacion->update($input);

        return redirect()->route('programaciones.index')
            ->with('success','La informacion fue actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Programacion::find($id)->delete();
        return redirect()->route('programaciones.index')
            ->with('success','El item de Programacion fue eliminado correctamente');
    }

    public function clonar($id){
        $clientes=Cliente::pluck('razon_social','id')->all();
        $programacion = Programacion::find($id);
        $transportes=Transporte::where('ruta','Dentro de Cusco')->select("id", DB::raw("CONCAT(transportes.marca,' ',transportes.modelo,' ',transportes.tipo_vehiculo,' ',transportes.placa) as full_name"))
            ->pluck('full_name','id')->all();
        $conductores=Conductor::pluck('nombres','id')->all();
        return view('editor.programacion.clonar',compact('programacion','sucursal', 'transportes','conductores','clientes'));
    }

    public function procesar($id){
        $programacion = Programacion::find($id);
        $sucursal=$programacion->sucursal;
        $responsables_tecnicos=array();
        $responsables_tecnicos[$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico]=$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico;
        if ($sucursal->nombres_responsable_tecnico_2!="" && $sucursal->dni_responsable_tecnico!="")
        $responsables_tecnicos[$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2]=$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2;
        $responsables_tecnicos[""]="No especificar";
        if ($sucursal->dni_responsable_tecnico=="" || $sucursal->dni_responsable_tecnico==null) $advertencia=1; else $advertencia=0;
        return view('editor.programacion.procesar',compact('programacion','responsables_tecnicos', 'advertencia'));
    }

    public function registrarrecepcion(Request $request){

        $this->validate($request, [
            'responsable_tecnico' => 'nullable',
            'residuos' => 'required|array',
            'residuos.*'=>'integer',
            'sucursales' => 'required|array',
            'sucursales.*'=>'integer',
            'recipientes' => 'required|array',
            'recipientes.*' => 'integer',
            'nro_recipientes'=>'required|array',
            'nro_recipientes.*'=>'integer|nullable',
            'volumen'=>'required|array',
            'volumen.*'=>'between:0,99999.99|nullable',
            'guia_remision_remitente'=>'nullable'

        ]);
        //Primero actualizamos los datos de la programacion con los datos generales
        $programacion=Programacion::find($request->programacion);
        $fecha_actual=date('Y-m-d H:i:s');

        if ($request->responsable_tecnico!="") {
            $partes_responsable_tecnico = explode(':', $request->responsable_tecnico);
            $actualizar_programacion = array("nombres_responsable_tecnico"=>trim($partes_responsable_tecnico[0]), "dni_responsable_tecnico"=>trim($partes_responsable_tecnico[1]),"estado" => "1", "fecha_recepcion"=>$fecha_actual);
        }
        else $actualizar_programacion=array("estado"=>"1", "fecha_recepcion"=>$fecha_actual);
        //if ($request->guia_remision_remitente!="" && $request->guia_remision_remitente!=null) $actualizar_programacion["guia_remision_remitente"]=$request->guia_remision_remitente;

        //procesamos las recepciones en detalle
        $numero_recepciones=0;
        for ($i=0; $i<=count($request->nro_recipientes)-1; $i++){
            if ($request->nro_recipientes[$i]!=null && $request->nro_recipientes[$i]!="" && $request->volumen[$i]!=null && $request->volumen[$i]!=""){
                $numero_recepciones++;
                $recepcion=new Recepcion();
                $recepcion->nro_recipientes=$request->nro_recipientes[$i];
                $recepcion->volumen=$request->volumen[$i];
                $recepcion->programacion_id=$request->programacion;
                $recepcion->residuo_id=$request->residuos[$i];
                $recepcion->sucursal_id=$request->sucursales[$i];
                $recepcion->recipiente_id=$request->recipientes[$i];
                $valor='guia_remision_remitente_'.$request->sucursales[$i];
                $gr_remitente=$request->$valor;
                $recepcion->guia_remision_remitente=$gr_remitente;
                $recepcion->save();
            }
        }

        if ($numero_recepciones==0) return Redirect::back()->withErrors(['Por favor debe ingresar al menos un registro completo para algun residuo sólido']);
        else{
            $programacion->update($actualizar_programacion);
            return redirect()->route('programaciones.index')
                ->with('success','La recepcion se registro correctamente');
        }



    }

    public function getresiduodata(Request $request){
        if (!$request->residuo_id or !$request->cliente_id) {
            $html = '';
        } else {
            $residuo = Residuo::find($request->residuo_id);
            $cliente = Cliente::find($request->cliente_id);
            $identificadortabla=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
            $html='<tr id="'.$identificadortabla.'" style="display:none;"><td><input class="residuos" data-placeholder="Residuo" name="residuos[]" type="hidden" value="'.$residuo->id.'"><h5><a href="#!">'.$residuo->nombre.'</a></h5></td>';
            if (count($cliente->sucursales)>1){
                $options="";
                $identificador=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
                foreach ($cliente->sucursales as $sucursal){
                    $options.='<option value='.$sucursal->id.'>'.$sucursal->direccion.'</option>';
                }
                $html.='<td><select class="sucursales" id="'.$identificador.'" data-placeholder="Seleccionar sucursal" required name="sucursales[]">'.$options.'</select></td>';
            }else{
                $identificador="nada";
                $html.='<input placeholder="sucursal" class="form-control" value="'.$cliente->sucursales[0]->id.'"  name="sucursales[]" type="hidden">';
            }

            $optionsrecipiente="";
            $identificadorrecipiente=substr(str_shuffle(str_repeat($x='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
            foreach ($residuo->recipientes as $recipiente){
                $optionsrecipiente.='<option value='.$recipiente->recipiente->id.'>'.$recipiente->recipiente->nombre.'</option>';
            }
            $html.='<td><select id="'.$identificadorrecipiente.'" class="recipientes" data-placeholder="Seleccionar recipiente" required name="recipientes[]">'.$optionsrecipiente.'</select></td>';

            $html.='<td><input placeholder="# recipientes" class="form-control" size="4" name="nro_recipientes[]" type="text"></td><td><input placeholder="L/gal/m3/Kg" class="form-control" name="volumen[]" type="text"></td></tr>';
        }

        return response()->json(['html' => $html,'identificador'=>$identificador, 'identificadorrecipiente'=>$identificadorrecipiente, 'identificadortabla'=>$identificadortabla]);
    }

    public function almacen(){
        $data = Recepcion::where('estado',0)->get();
        return view('editor.almacen.index',compact('data','residuos'));
    }

}
