<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conductor;
use App\Residuo;
use App\TipoCarga;
use App\Transporte;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:transporte-list', ['only' => ['index','show']]);
        $this->middleware('permission:transporte-create', ['only' => ['create','store']]);
        $this->middleware('permission:transporte-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:transporte-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Transporte::all();
        return view('editor.vehiculos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conductores=Conductor::pluck('nombres','id')->all();
        $residuos=Residuo::pluck('nombre','id')->all();
        return view('editor.vehiculos.create', compact('conductores','residuos'));
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
            'placa' => 'required', //hay veiculos con la misma placa |unique:transportes,placa
            'tipo_vehiculo' => 'required',
            'codigo_configuracion_vehicular' => 'required',
            'carga' => 'required',
            'unidad_carga' => 'required|between:0,99999.99',
            'marca' => 'required',
            'modelo' => 'required',
            'ruta' => 'required',
            'conductor_id' => 'required:integer',
            'residuos' => 'required'
        ]);

        $input = $request->all();

        $vehiculo = Transporte::create($input);
        $vehiculo->asignarResiduos($request->input('residuos'));

        return redirect()->route('vehiculos.index')
            ->with('success','El vehiculo de transporte se registro correctamente');
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
        $conductores=Conductor::pluck('nombres','id')->all();
        $vehiculo = Transporte::find($id);
        $residuos=Residuo::pluck('nombre','id')->all();
        $vehiculoResiduos = $vehiculo->join('residuos_vehiculo','residuos_vehiculo.vehiculo_id','transportes.id')
            ->join('residuos','residuos.id','residuos_vehiculo.residuo_id')
            ->where('transportes.id',$id)
            ->pluck('residuos.id','residuos.nombre')->all();
        return view('editor.vehiculos.edit',compact('vehiculo','conductores','residuos','vehiculoResiduos'));
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
            'placa' => 'required', //hay veiculos con la misma placa |unique:transportes,placa
            'tipo_vehiculo' => 'required',
            'codigo_configuracion_vehicular' => 'required',
            'carga' => 'required',
            'unidad_carga' => 'required|between:0,99999.99',
            'marca' => 'required',
            'modelo' => 'required',
            'ruta' => 'required',
            'conductor_id' => 'required:integer',
            'residuos' => 'required'
        ]);

        $input = $request->all();
        $vehiculo = Transporte::find($id);
        $vehiculo->update($input);

        DB::table('residuos_vehiculo')->where('vehiculo_id',$id)->delete();
        $vehiculo->asignarResiduos($request->input('residuos'));


        return redirect()->route('vehiculos.index')
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
        Transporte::find($id)->delete();
        return redirect()->route('vehiculos.index')
            ->with('success','El Vehiculo de transporte fue eliminado correctamente');
    }
}
