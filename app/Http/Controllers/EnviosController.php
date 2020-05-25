<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Envio;
use App\EnvioDetalle;
use App\Manifiesto;
use App\Planta;
use App\Residuo;
use App\Transporte;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:envio-list', ['only' => ['index','show']]);
        $this->middleware('permission:envio-create', ['only' => ['create','store']]);
        $this->middleware('permission:envio-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:envio-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $vehiculos=Transporte::where('ruta','Fuera de Cusco')->get();
        return view('editor.envios.index',compact('vehiculos'));
    }

    public function historial()
    {
        $envios=Envio::all();
        return view('editor.envios.historial',compact('envios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->get('vehiculo')!="" and $request->get('vehiculo')!=null){
        $vehiculo=$request->get('vehiculo');
        $carga=$request->get('carga');
        return view('editor.envios.create', compact('vehiculo','carga'));
        }else{
            return redirect()->back();
        }
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
            'vehiculo' => 'required|integer',
            'carga' => 'required',
        ]);

        $vehiculo=Transporte::find($request->vehiculo);
        $conductor=$vehiculo->cargaasignada[0]->conductor->id;
        $carga=$request->carga;

        $envio=new Envio();
        $envio->fecha_envio=$request->fecha;
        $envio->peso=$carga;
        $envio->vehiculo_id=$vehiculo->id;
        $envio->conductor_id=$conductor;
        $envio->save();

        //registramos el detalle de los manifiestos
        foreach ($vehiculo->cargaasignada as $manifiesto){
            $detalle_envio=new EnvioDetalle();
            $detalle_envio->manifiesto_id=$manifiesto->id;
            $detalle_envio->envio_id=$envio->id;
            $detalle_envio->save();
            //actualizamos el eenvio en los manifiestos
            $mani=Manifiesto::find($manifiesto->id);
            $mani->update(['enviado'=>1]);
        }

        return redirect()->route('envios.historial')
            ->with('success','El envio se proceso correctamente correctamente');
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
        $planta = Planta::find($id);
        $residuos=Residuo::pluck('nombre','id')->all();
        $plantaResiduos = $planta->join('residuos_planta','residuos_planta.planta_id','plantas.id')
            ->join('residuos','residuos.id','residuos_planta.residuo_id')
            ->where('plantas.id',$id)
            ->pluck('residuos.id','residuos.nombre')->all();
        return view('editor.plantas.edit',compact('planta','residuos','planta','plantaResiduos'));
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
            'razon_social' => 'required',
            'ruc' => 'required|digits:11|unique:plantas,ruc,'.$id,
            'registro_digesa'=>'required',
            'fecha_vencimiento_digesa'=>'required|date',
            'autorizacion_sanitaria'=>'required',
            'autorizacion_municipal'=>'required',
            'pais_importador'=>'required',
            'residuos' => 'required'
        ]);

        $input = $request->all();
        $planta = Planta::find($id);
        $planta->update($input);

        DB::table('residuos_planta')->where('planta_id',$id)->delete();
        $planta->asignarResiduos($request->input('residuos'));

        return redirect()->route('plantas.index')
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
        Planta::find($id)->delete();
        return redirect()->route('plantas.index')
            ->with('success','El Planta de procesamiento fue eliminado correctamente');
    }
}
