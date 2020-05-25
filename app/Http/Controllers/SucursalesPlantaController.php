<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Departamento;
use App\Distrito;
use App\Planta;
use App\Provincia;
use App\SucursalCliente;
use App\SucursalPlanta;
use Illuminate\Http\Request;

class SucursalesPlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:plantasucursal-list', ['only' => ['index','show']]);
        $this->middleware('permission:plantasucursal-create', ['only' => ['create','store']]);
        $this->middleware('permission:plantasucursal-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:plantasucursal-delete', ['only' => ['destroy']]);
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->get('planta')!="" and $request->get('planta')!=null){
            $planta=Planta::find($request->get('planta'));
            $departamentos=Departamento::pluck('nombre','id')->all();
            return view('editor.sucursalesplanta.create', compact('planta','departamentos'));
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
            'planta_id'=> 'required|integer',
            'direccion' => 'required',
            'numero' => 'required',
            'distrito_id' => 'required|integer',
            'email' =>'nullable|email',
            'nombres_representante_legal'=>'required',
            'email_representante_legal'=>'nullable|email',
            'dni_representante_legal'=>'required|digits:8',
            'nombres_responsable_tecnico'=>'required',
            'email_responsable_tecnico'=>'nullable|email',
            'dni_responsable_tecnico'=>'nullable|digits:8',
            'cip_responsable_tecnico'=>'required',
            'email_responsable_contabilidad'=>'nullable|email',
            'dni_responsable_contabilidad'=>'nullable|digits:8',
        ]);

        $input = $request->all();
        unset($input['departamento']);
        unset($input['provincia']); ;
        SucursalPlanta::create($input);

        return redirect()->route('plantas.index')
            ->with('success','La sucursal se registro correctamente');
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
        $sucursal = SucursalPlanta::find($id);
        $departamentos=Departamento::pluck('nombre','id')->all();
        $distrito_sucursal=Distrito::find($sucursal->distrito_id);
        $provincia_sucursal= $distrito_sucursal->provincia;
        $departamento_sucursal= $provincia_sucursal->departamento;
        $provincias=Provincia::where('departamento_id',$departamento_sucursal->id)->pluck('nombre','id')->all();
        $distritos=Distrito::where('provincia_id',$provincia_sucursal->id)->pluck('nombre','id')->all();
        return view('editor.sucursalesplanta.edit',compact('sucursal','departamentos','provincia_sucursal','departamento_sucursal','provincias','distritos'));
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
            'direccion' => 'required',
            'numero' => 'required',
            'distrito_id' => 'required|integer',
            'email' =>'nullable|email',
            'nombres_representante_legal'=>'required',
            'email_representante_legal'=>'nullable|email',
            'dni_representante_legal'=>'required|digits:8',
            'nombres_responsable_tecnico'=>'required',
            'email_responsable_tecnico'=>'nullable|email',
            'dni_responsable_tecnico'=>'nullable|digits:8',
            'cip_responsable_tecnico'=>'required',
            'email_responsable_contabilidad'=>'nullable|email',
            'dni_responsable_contabilidad'=>'nullable|digits:8',
        ]);

        $input = $request->all();
        unset($input['departamento']);
        unset($input['provincia']);
        $sucursal = SucursalPlanta::find($id);
        $sucursal->update($input);

        return redirect()->route('plantas.index')
            ->with('success','La sucursal se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SucursalPlanta::find($id)->delete();
        return redirect()->route('plantas.index')
            ->with('success','La sucursal fue eliminada correctamente');
    }
}
