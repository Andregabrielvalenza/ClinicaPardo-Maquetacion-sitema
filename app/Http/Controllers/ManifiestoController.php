<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conductor;
use App\Configuracion;
use App\Manifiesto;
use App\ManifiestoDetalle;
use App\Planta;
use App\PlantaResiduo;
use App\Recepcion;
use App\Residuo;
use App\SucursalPlanta;
use App\Transporte;
use App\TransporteResiduo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Dompdf\Options;
use Dompdf\Dompdf;

class ManifiestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:manifiesto-list', ['only' => ['index','show']]);
        $this->middleware('permission:manifiesto-create', ['only' => ['create','store']]);
        $this->middleware('permission:manifiesto-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:manifiesto-delete', ['only' => ['destroy']]);
    }

    public function getdataplanta(Request $request)
    {
        if (!$request->sucursal_id) {
            return response()->json(['html' => '']);
        } else {
            $sucursal = SucursalPlanta::find($request->sucursal_id);
            $distrito= $sucursal->distrito->nombre;
            $provincia=$sucursal->distrito->provincia->nombre;
            $departamento=$sucursal->distrito->provincia->departamento->nombre;
            $planta = $sucursal->planta;

            //tremos la informacion de los responsables tecnicos
            $responsables_tecnicos=array();
            $responsables_tecnicos[$sucursal->nombres_responsable_tecnico.':'.$sucursal->cip_responsable_tecnico]=$sucursal->nombres_responsable_tecnico.':'.$sucursal->cip_responsable_tecnico;
            if ($sucursal->nombres_responsable_tecnico_2!="" && $sucursal->cip_responsable_tecnico!="")
                $responsables_tecnicos[$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->cip_responsable_tecnico_2]=$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->cip_responsable_tecnico_2;
            $responsables_tecnicos["0"]="Ingresar Manualmente";
            $responsables_tecnicos[""]="No especificar";
            if ($sucursal->cip_responsable_tecnico=="" || $sucursal->cip_responsable_tecnico==null) $advertencia=1; else $advertencia=0;

            $html = '';
            foreach ($responsables_tecnicos as $key=>$value) {
                $html .= '<option value="'.$key.'">'.$value.'</option>';
            }
        }

        return response()->json(['planta' => $planta, 'sucursal'=>$sucursal, 'distrito'=>$distrito, 'provincia'=>$provincia, 'departamento'=>$departamento, 'html'=>$html, 'advertencia'=>$advertencia]);
    }

    public function index()
    {
        $data = Manifiesto::where('enviado',0)->get();
        return view('editor.manifiestos.index',compact('data'));
    }

    public function historial()
    {
        $data=Manifiesto::where('enviado',1)->get();
        return view('editor.manifiestos.historial',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->get('recepcion')!="" and $request->get('recepcion')!=null){
            $recepcion=Recepcion::find($request->get('recepcion'));

            //traemos los responsables tecnicos de la sucursal
            $sucursal=$recepcion->sucursal;
            $responsables_tecnicos=array();
            $responsables_tecnicos[$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico]=$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico;
            if ($sucursal->nombres_responsable_tecnico_2!="" && $sucursal->dni_responsable_tecnico!="")
                $responsables_tecnicos[$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2]=$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2;
            $responsables_tecnicos["0"]="Ingresar Manualmente";
            $responsables_tecnicos[""]="No especificar";

            //traemos al responsable elegido en la recepcion del mismo
            if ($recepcion->programacion->nombres_responsable_tecnico!=NULL) {
                $responsable_tecnico = $recepcion->programacion->nombres_responsable_tecnico . ':' . $recepcion->programacion->dni_responsable_tecnico;
                if ($recepcion->programacion->dni_responsable_tecnico=="" || $recepcion->programacion->dni_responsable_tecnico==null) $advertencia_rt=1; else $advertencia_rt=0;
            }
            else {$responsable_tecnico=""; $advertencia_rt=0;}



            //tremos la informacion del residuo si puede estar acompañado o debe estar solo
            $estados=array();
            $peligrosidades=array();
            $total_peso=0;
            if ($recepcion->residuo->junto==0){
                $residuos=array($recepcion->residuo->id=>$recepcion->residuo->nombre);
                //$recepciones=Recepcion::where('id',$recepcion->id)->get();
                $recepciones=array($recepcion);
            }else{
                $residuos=Recepcion::where('programacion_id',$recepcion->programacion_id)->where('sucursal_id',$recepcion->sucursal_id)->where('recepciones.estado','0')
                    ->join('residuos','residuos.id','recepciones.residuo_id')
                    ->where('residuos.junto','1')
                    ->pluck('residuos.nombre','residuos.id')->all();
                $recepciones=Recepcion::select('recepciones.*')->where('programacion_id',$recepcion->programacion_id)->where('sucursal_id',$recepcion->sucursal_id)->where('recepciones.estado','0')
                    ->join('residuos','residuos.id','recepciones.residuo_id')
                    ->where('residuos.junto','1')->get();
            }

            //tremos las peligrosidades
            foreach ($recepciones as $r){
                $estados[$r->residuo->estado]=$r->residuo->estado;
                $total_peso+=$r->volumen;
                foreach ($r->residuo->peligrosidades as $peli){
                    $peligrosidades[$peli->peligrosidad->nombre]=$peli->peligrosidad->nombre;
                }
            }

            //traemos los vehiculos de transpprte
            //$vehiculos=Transporte::where('ruta','Fuera de Cusco')->select("id", DB::raw("CONCAT(transportes.marca,' ',transportes.modelo,' ',transportes.tipo_vehiculo,' ',transportes.placa) as full_name"))
            //    ->pluck('full_name','id')->all();

            $choferes=Conductor::pluck('nombres','id')->all();

            $array_residuos=array();
            foreach($residuos as $clave => $valor){
                $array_residuos[]=(int)$clave;
            }

            $plantas=PlantaResiduo::select('residuos_planta.planta_id',\DB::raw('COUNT(id) as cantidad'))->whereIn('residuo_id', $array_residuos)->groupBy('planta_id')->get();
            $vehiculos=TransporteResiduo::select('residuos_vehiculo.vehiculo_id',\DB::raw('COUNT(residuos_vehiculo.id) as cantidad'))->join('transportes','transportes.id','residuos_vehiculo.vehiculo_id')->where('ruta','Fuera de Cusco')->whereIn('residuo_id', $array_residuos)->groupBy('vehiculo_id')->get();


            return view('editor.manifiestos.create', compact('recepcion','responsables_tecnicos','responsable_tecnico','residuos','recepciones','estados','peligrosidades','vehiculos','choferes','total_peso','plantas', 'advertencia_rt'));
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
            'responsable_tecnico_1' => 'nullable',
            'responsable_tecnico_2' => 'nullable',
            'responsable_tecnico_3' => 'nullable',
            'responsable_planta' => 'nullable',
            'responsable_planta_2' => 'nullable',
            'sucursal_cliente_id' => 'required|integer',
            'planta' => 'required|integer',
            'conductor' => 'required|integer',
            'vehiculo' => 'required|integer',
            'recepciones' => 'required|array',
            'recepciones.*'=>'integer|required',
            'tipo_responsable_tecnico_1'=>'integer|required',
            'tipo_responsable_tecnico_2'=>'integer|required',
            'tipo_responsable_tecnico_3'=>'integer|required',
            'tipo_responsable_planta'=>'integer|required',
            'tipo_responsable_planta_2'=>'integer|required'
        ]);

        $configuracion=Configuracion::find(1);
        $valor_real_numeracion=$configuracion->numeracion_manifiesto;
        $valor_real_numeracion_transportista=$configuracion->numero_guia_remision_transportista;
        $serie_numeracion_transportista=$configuracion->serie_guia_remision_transportista;
        $numeracion=(string)$configuracion->numeracion_manifiesto;
        $numeracion_transportista=(string)$configuracion->numero_guia_remision_transportista;
        $pre="";
        $pre_transporista="";
        while (strlen($pre)<6-strlen($numeracion)){
            $pre.='0';
        }
        $numeracion=$pre.$numeracion;

        while (strlen($pre_transporista)<7-strlen($numeracion_transportista)){
            $pre_transporista.='0';
        }
        $numeracion_transportista=$pre_transporista.$numeracion_transportista;

        /*if ($request->responsable_tecnico_1!="") $partes_responsable_tecnico_1 = explode(':', $request->responsable_tecnico_1); else {$partes_responsable_tecnico_1[0]=NULL; $partes_responsable_tecnico_1[1]=NULL;}
        if ($request->responsable_tecnico_2!="") $partes_responsable_tecnico_2 = explode(':', $request->responsable_tecnico_2); else {$partes_responsable_tecnico_2[0]=NULL; $partes_responsable_tecnico_2[1]=NULL;}
        if ($request->responsable_tecnico_3!="") $partes_responsable_tecnico_3 = explode(':', $request->responsable_tecnico_3); else {$partes_responsable_tecnico_3[0]=NULL; $partes_responsable_tecnico_3[1]=NULL;}
        if ($request->responsable_planta!="") $partes_responsable_planta = explode(':', $request->responsable_planta); else {$partes_responsable_planta[0]=NULL; $partes_responsable_planta[1]=NULL;}
        if ($request->responsable_planta_2!="") $partes_responsable_planta_2 = explode(':', $request->responsable_planta_2); else {$partes_responsable_planta_2[0]=NULL; $partes_responsable_planta_2[1]=NULL;}*/

        if ($request->tipo_responsable_tecnico_1==0) {
            if ($request->responsable_tecnico_1 != "") $partes_responsable_tecnico_1 = explode(':', $request->responsable_tecnico_1); else {
                $partes_responsable_tecnico_1[0] = NULL;
                $partes_responsable_tecnico_1[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_1[0] = $request->nombres_responsable_tecnico_1;
            $partes_responsable_tecnico_1[1] = $request->dni_responsable_tecnico_1;
        }

        if ($request->tipo_responsable_tecnico_2==0) {
            if ($request->responsable_tecnico_2 != "") $partes_responsable_tecnico_2 = explode(':', $request->responsable_tecnico_2); else {
                $partes_responsable_tecnico_2[0] = NULL;
                $partes_responsable_tecnico_2[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_2[0] = $request->nombres_responsable_tecnico_2;
            $partes_responsable_tecnico_2[1] = $request->dni_responsable_tecnico_2;
        }

        if ($request->tipo_responsable_tecnico_3==0) {
            if ($request->responsable_tecnico_3 != "") $partes_responsable_tecnico_3 = explode(':', $request->responsable_tecnico_3); else {
                $partes_responsable_tecnico_3[0] = NULL;
                $partes_responsable_tecnico_3[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_3[0] = $request->nombres_responsable_tecnico_3;
            $partes_responsable_tecnico_3[1] = $request->dni_responsable_tecnico_3;
        }

        if ($request->tipo_responsable_planta==0) {
            if ($request->responsable_planta != "") $partes_responsable_planta = explode(':', $request->responsable_planta); else {
                $partes_responsable_planta[0] = NULL;
                $partes_responsable_planta[1] = NULL;
            }
        }else{
            $partes_responsable_planta[0] = $request->nombres_responsable_planta_1;
            $partes_responsable_planta[1] = $request->cip_responsable_planta_1;
        }

        if ($request->tipo_responsable_planta_2==0) {
            if ($request->responsable_planta_2 != "") $partes_responsable_planta_2 = explode(':', $request->responsable_planta_2); else {
                $partes_responsable_planta_2[0] = NULL;
                $partes_responsable_planta_2[1] = NULL;
            }
        }else{
            $partes_responsable_planta_2[0] = $request->nombres_responsable_planta_2;
            $partes_responsable_planta_2[1] = $request->cip_responsable_planta_2;
        }

        //guardamos la informacion del manifiesto
        $manifiesto=new Manifiesto();
        $manifiesto->numero=$numeracion;
        $manifiesto->nombres_responsable_tecnico_1=trim($partes_responsable_tecnico_1[0]);
        $manifiesto->dni_responsable_tecnico_1=trim($partes_responsable_tecnico_1[1]);
        $manifiesto->nombres_responsable_tecnico_2=trim($partes_responsable_tecnico_2[0]);
        $manifiesto->dni_responsable_tecnico_2=trim($partes_responsable_tecnico_2[1]);
        $manifiesto->nombres_responsable_tecnico_3=trim($partes_responsable_tecnico_3[0]);
        $manifiesto->dni_responsable_tecnico_3=trim($partes_responsable_tecnico_3[1]);
        $manifiesto->planta_nombres_responsable_tecnico_1=trim($partes_responsable_planta[0]);
        $manifiesto->planta_cip_responsable_tecnico_1=trim($partes_responsable_planta[1]);
        $manifiesto->planta_nombres_responsable_tecnico_2=trim($partes_responsable_planta_2[0]);
        $manifiesto->planta_cip_responsable_tecnico_2=trim($partes_responsable_planta_2[1]);
        $manifiesto->sucursal_cliente_id = $request->sucursal_cliente_id;
        $manifiesto->sucursal_planta_id = $request->planta;
        $manifiesto->conductor_id = $request->conductor;
        $manifiesto->transporte_id = $request->vehiculo;
        //guardamos la guia de remision transportista
        $manifiesto->guia_remision_transportista = $serie_numeracion_transportista.'-'.$numeracion_transportista;
        $manifiesto->save();

        //guardamos la informacion del detalle del manifiesto
        $numero_recepciones=0;
        for ($i=0; $i<=count($request->recepciones)-1; $i++){
            if ($request->recepciones[$i]!=null && $request->recepciones[$i]!=""){
                $numero_recepciones++;
                $detalle=new ManifiestoDetalle();
                $detalle->manifiesto_id=$manifiesto->id;
                $detalle->recepcion_id=$request->recepciones[$i];
                $detalle->save();
            }
        }

        //actualizamos los estados de las recepciones
        for ($i=0; $i<=count($request->recepciones)-1; $i++){
            if ($request->recepciones[$i]!=null && $request->recepciones[$i]!=""){
                $recepcion=Recepcion::find($request->recepciones[$i]);
                $actualizar_recepcion=array('estado'=>'1');
                $recepcion->update($actualizar_recepcion);
            }
        }

        //actualizamos el valor de la numeracion
        $configuracion->update(["numeracion_manifiesto"=>$valor_real_numeracion+1, "numero_guia_remision_transportista"=>$valor_real_numeracion_transportista+1]);

        return redirect()->route('manifiestos.index')
            ->with('success','El manifiesto se genero correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manifiesto=Manifiesto::find($id);
        $options = new Options();
        $options->set('enable_html5_parser', true);
        $estados=array();
        $peligrosidades=array();
        $total_peso=0;
        //tremos las peligrosidades
        foreach ($manifiesto->detalles as $r){
            $estados[$r->recepcion->residuo->estado]=$r->recepcion->residuo->estado;
            $total_peso+=$r->recepcion->volumen;
            foreach ($r->recepcion->residuo->peligrosidades as $peli){
                $peligrosidades[$peli->peligrosidad->nombre]=$peli->peligrosidad->nombre;
            }
        }

        $residuos=array();
        //tremos los residuos
        foreach($manifiesto->detalles as $detalle){
            $residuos[$detalle->recepcion->residuo->id]=$detalle->recepcion->residuo->nombre;
        }

        $pies=array("Autoridad competente","Empresa de transporte","Generador","Planta de procesamiento");

        $view =  \View::make('manifiesto', compact('manifiesto','estados','total_peso','peligrosidades','residuos','pies'))->render();
        $pdf = new Dompdf();
        $pdf->setOptions($options);
        //$pdf->loadHtml($view);
        $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view)->setPaper('A4', 'landscape');
        return $pdf->stream('invoice');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $manifiesto=Manifiesto::find($id);

        $sucursal=$manifiesto->sucursalcliente;
        $responsables_tecnicos=array();
        $responsables_tecnicos[$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico]=$sucursal->nombres_responsable_tecnico.':'.$sucursal->dni_responsable_tecnico;
        if ($sucursal->nombres_responsable_tecnico_2!="" && $sucursal->dni_responsable_tecnico!="")
            $responsables_tecnicos[$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2]=$sucursal->nombres_responsable_tecnico_2.':'.$sucursal->dni_responsable_tecnico_2;

        if ($manifiesto->nombres_responsable_tecnico_1!="" and $manifiesto->nombres_responsable_tecnico_1!=NULL){
            $responsables_tecnicos[$manifiesto->nombres_responsable_tecnico_1.':'.$manifiesto->dni_responsable_tecnico_1]=$manifiesto->nombres_responsable_tecnico_1.':'.$manifiesto->dni_responsable_tecnico_1;
            $responsable_tecnico_1=$manifiesto->nombres_responsable_tecnico_1.':'.$manifiesto->dni_responsable_tecnico_1;
            if ($manifiesto->dni_responsable_tecnico_1=="" || $manifiesto->dni_responsable_tecnico_1==null) $advertencia_rt1=1; else $advertencia_rt1=0;
        }else{
            $responsable_tecnico_1="";
            $advertencia_rt1=0;
        }
        if ($manifiesto->nombres_responsable_tecnico_2!="" and $manifiesto->nombres_responsable_tecnico_2!=NULL){
            $responsables_tecnicos[$manifiesto->nombres_responsable_tecnico_2.':'.$manifiesto->dni_responsable_tecnico_2]=$manifiesto->nombres_responsable_tecnico_2.':'.$manifiesto->dni_responsable_tecnico_2;
            $responsable_tecnico_2=$manifiesto->nombres_responsable_tecnico_2.':'.$manifiesto->dni_responsable_tecnico_2;
            if ($manifiesto->dni_responsable_tecnico_2=="" || $manifiesto->dni_responsable_tecnico_2==null) $advertencia_rt2=1; else $advertencia_rt2=0;
        }else{
            $responsable_tecnico_2="";
            $advertencia_rt2=0;
        }
        if ($manifiesto->nombres_responsable_tecnico_3!="" and $manifiesto->nombres_responsable_tecnico_3!=NULL){
            $responsables_tecnicos[$manifiesto->nombres_responsable_tecnico_3.':'.$manifiesto->dni_responsable_tecnico_3]=$manifiesto->nombres_responsable_tecnico_3.':'.$manifiesto->dni_responsable_tecnico_3;
            $responsable_tecnico_3=$manifiesto->nombres_responsable_tecnico_3.':'.$manifiesto->dni_responsable_tecnico_3;
            if ($manifiesto->dni_responsable_tecnico_3=="" || $manifiesto->dni_responsable_tecnico_3==null) $advertencia_rt1=3; else $advertencia_rt3=0;
        }else{
            $responsable_tecnico_3="";
            $advertencia_rt3=0;
        }
        $responsables_tecnicos["0"]="Ingresar Manualmente";
        $responsables_tecnicos[""]="No especificar";

        $estados=array();
        $peligrosidades=array();
        $total_peso=0;
        //tremos las peligrosidades
        foreach ($manifiesto->detalles as $r){
            $estados[$r->recepcion->residuo->estado]=$r->recepcion->residuo->estado;
            $total_peso+=$r->recepcion->volumen;
            foreach ($r->recepcion->residuo->peligrosidades as $peli){
                $peligrosidades[$peli->peligrosidad->nombre]=$peli->peligrosidad->nombre;
            }
        }

        $residuos=array();
        //tremos los residuos
        foreach($manifiesto->detalles as $detalle){
            $residuos[$detalle->recepcion->residuo->id]=$detalle->recepcion->residuo->nombre;
        }

        if ($request->get('origen')!="" and $request->get('origen')!=NULL) $retorno=1; else $retorno=0;

        return view('editor.manifiestos.edit', compact('manifiesto','estados','total_peso','peligrosidades','residuos', 'responsable_tecnico_1', 'responsable_tecnico_2', 'responsables_tecnicos', 'responsable_tecnico_3','advertencia_rt1','advertencia_rt2','advertencia_rt3', 'retorno'));
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
            'responsable_tecnico_1' => 'nullable',
            'responsable_tecnico_2' => 'nullable',
            'responsable_tecnico_3' => 'nullable',
            'responsable_planta' => 'nullable',
            'responsable_planta_2' => 'nullable',
            'recepciones' => 'required|array',
            'recepciones.*'=>'integer|required',
            'volumen' => 'required|array',
            'volumen.*'=>'between:0,99999.99|required',
            'nro_recipientes' => 'required|array',
            'nro_recipientes.*'=>'integer|required',
            'tipo_responsable_tecnico_1'=>'integer|required',
            'tipo_responsable_tecnico_2'=>'integer|required',
            'tipo_responsable_tecnico_3'=>'integer|required',
            'tipo_responsable_planta'=>'integer|required',
            'tipo_responsable_planta_2'=>'integer|required'
        ]);

        $manifiesto=Manifiesto::find($id);

        if ($request->tipo_responsable_tecnico_1==0) {
            if ($request->responsable_tecnico_1 != "") $partes_responsable_tecnico_1 = explode(':', $request->responsable_tecnico_1); else {
                $partes_responsable_tecnico_1[0] = NULL;
                $partes_responsable_tecnico_1[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_1[0] = $request->nombres_responsable_tecnico_1;
            $partes_responsable_tecnico_1[1] = $request->dni_responsable_tecnico_1;
        }

        if ($request->tipo_responsable_tecnico_2==0) {
            if ($request->responsable_tecnico_2 != "") $partes_responsable_tecnico_2 = explode(':', $request->responsable_tecnico_2); else {
                $partes_responsable_tecnico_2[0] = NULL;
                $partes_responsable_tecnico_2[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_2[0] = $request->nombres_responsable_tecnico_2;
            $partes_responsable_tecnico_2[1] = $request->dni_responsable_tecnico_2;
        }

        if ($request->tipo_responsable_tecnico_3==0) {
            if ($request->responsable_tecnico_3 != "") $partes_responsable_tecnico_3 = explode(':', $request->responsable_tecnico_3); else {
                $partes_responsable_tecnico_3[0] = NULL;
                $partes_responsable_tecnico_3[1] = NULL;
            }
        }else{
            $partes_responsable_tecnico_3[0] = $request->nombres_responsable_tecnico_3;
            $partes_responsable_tecnico_3[1] = $request->dni_responsable_tecnico_3;
        }

        if ($request->tipo_responsable_planta==0) {
            if ($request->responsable_planta != "") $partes_responsable_planta = explode(':', $request->responsable_planta); else {
                $partes_responsable_planta[0] = NULL;
                $partes_responsable_planta[1] = NULL;
            }
        }else{
            $partes_responsable_planta[0] = $request->nombres_responsable_planta_1;
            $partes_responsable_planta[1] = $request->cip_responsable_planta_1;
        }

        if ($request->tipo_responsable_planta_2==0) {
            if ($request->responsable_planta_2 != "") $partes_responsable_planta_2 = explode(':', $request->responsable_planta_2); else {
                $partes_responsable_planta_2[0] = NULL;
                $partes_responsable_planta_2[1] = NULL;
            }
        }else{
            $partes_responsable_planta_2[0] = $request->nombres_responsable_planta_2;
            $partes_responsable_planta_2[1] = $request->cip_responsable_planta_2;
        }

        $manifiesto_actualizar=array();
        //guardamos la informacion del manifiesto

        $manifiesto_actualizar["nombres_responsable_tecnico_1"]=trim($partes_responsable_tecnico_1[0]);
        $manifiesto_actualizar["dni_responsable_tecnico_1"]=trim($partes_responsable_tecnico_1[1]);
        $manifiesto_actualizar["nombres_responsable_tecnico_2"]=trim($partes_responsable_tecnico_2[0]);
        $manifiesto_actualizar["dni_responsable_tecnico_2"]=trim($partes_responsable_tecnico_2[1]);
        $manifiesto_actualizar["nombres_responsable_tecnico_3"]=trim($partes_responsable_tecnico_3[0]);
        $manifiesto_actualizar["dni_responsable_tecnico_3"]=trim($partes_responsable_tecnico_3[1]);
        $manifiesto_actualizar["planta_nombres_responsable_tecnico_1"]=trim($partes_responsable_planta[0]);
        $manifiesto_actualizar["planta_cip_responsable_tecnico_1"]=trim($partes_responsable_planta[1]);
        $manifiesto_actualizar["planta_nombres_responsable_tecnico_2"]=trim($partes_responsable_planta_2[0]);
        $manifiesto_actualizar["planta_cip_responsable_tecnico_2"]=trim($partes_responsable_planta_2[1]);
        $manifiesto->update($manifiesto_actualizar);

        //actualizamos la informacion del detalle del manifiesto
        for ($i=0; $i<=count($request->recepciones)-1; $i++){
            if ($request->recepciones[$i]!=null && $request->recepciones[$i]!=""){
                $recepcion=Recepcion::find($request->recepciones[$i]);
                $actualizar_recepcion=array('volumen'=>$request->volumen[$i], 'nro_recipientes'=>$request->nro_recipientes[$i]);
                $recepcion->update($actualizar_recepcion);
            }
        }

        if (isset($request->retorno) && $request->retorno!=null)
        return redirect()->route('envios.index')
            ->with('success','El manifiesto se actualizo correctamente');
        else
        return redirect()->route('manifiestos.index')
            ->with('success','El manifiesto se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
