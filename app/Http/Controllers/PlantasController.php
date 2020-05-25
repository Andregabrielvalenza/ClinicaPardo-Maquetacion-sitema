<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Planta;
use App\Residuo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class PlantasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:planta-list', ['only' => ['index','show']]);
        $this->middleware('permission:planta-create', ['only' => ['create','store']]);
        $this->middleware('permission:planta-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:planta-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Planta::all();
        return view('editor.plantas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residuos=Residuo::pluck('nombre','id')->all();
        return view('editor.plantas.create', compact('residuos'));
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
            'razon_social' => 'required',
            'ruc' => 'required|digits:11|unique:plantas,ruc',
            'registro_digesa'=>'required',
            'fecha_vencimiento_digesa'=>'required|date',
            'autorizacion_sanitaria'=>'required',
            'autorizacion_municipal'=>'required',
            'pais_importador'=>'required',
            'residuos' => 'required'
        ]);

        $input = $request->all();

        $planta = Planta::create($input);
        $planta->asignarResiduos($request->input('residuos'));

        return redirect()->route('plantas.index')
            ->with('success','La planta de procesamiento se registro correctamente');
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
