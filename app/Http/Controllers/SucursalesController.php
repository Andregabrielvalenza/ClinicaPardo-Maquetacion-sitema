<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\SucursalCliente;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    function __construct()
    {
        $this->middleware('permission:sucursal-list', ['only' => ['index','show']]);
        $this->middleware('permission:sucursal-create', ['only' => ['create','store']]);
        $this->middleware('permission:sucursal-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sucursal-delete', ['only' => ['destroy']]);
    }

    public function getprovincias(Request $request)
    {
        if (!$request->departamento_id) {
            $html = '<option value="">Seleccionar provincia</option>';
        } else {
            $provincias = Provincia::where('departamento_id', $request->departamento_id)->get();
            $html = '<option value="" selected>Seleccionar provincia</option>';
            foreach ($provincias as $provincia) {
                $html .= '<option value="'.$provincia->id.'">'.$provincia->nombre.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getdistritos(Request $request)
    {
        if (!$request->provincia_id) {
            $html = '<option value="">Seleccionar distrito</option>';
        } else {
            $distritos = Distrito::where('provincia_id', $request->provincia_id)->get();
            $html = '<option value="" selected>Seleccionar distrito</option>';
            foreach ($distritos as $distrito) {
                $html .= '<option value="'.$distrito->id.'">'.$distrito->nombre.'</option>';
            }
        }

        return response()->json(['html' => $html]);
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
        if ($request->get('cliente')!="" and $request->get('cliente')!=null){
            $cliente=Cliente::find($request->get('cliente'));
            $departamentos=Departamento::pluck('nombre','id')->all();
            return view('editor.sucursales.create', compact('cliente','departamentos'));
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
            'cliente_id'=> 'required|integer',
            'direccion' => 'required',
            'numero' => 'required',
            'distrito_id' => 'required|integer',
            'email' =>'email|nullable',
            'nombres_representante_legal'=>'required',
            'email_representante_legal'=>'email|nullable',
            'dni_representante_legal'=>'digits:8|required',
            'nombres_responsable_tecnico'=>'required',
            'email_responsable_tecnico'=>'email|nullable',
            'dni_responsable_tecnico'=>'digits_between:5,8|required',
            'email_responsable_tecnico_2'=>'email|nullable',
            'dni_responsable_tecnico_2'=>'digits_between:5,8|nullable',
            'email_responsable_contabilidad'=>'email|nullable',
            'dni_responsable_contabilidad'=>'digits:8|nullable',
        ]);

        $input = $request->all();
        unset($input['departamento']);
        unset($input['provincia']); ;
        SucursalCliente::create($input);

        return redirect()->route('clientes.index')
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
        $sucursal = SucursalCliente::find($id);
        $departamentos=Departamento::pluck('nombre','id')->all();
        $distrito_sucursal=Distrito::find($sucursal->distrito_id);
        $provincia_sucursal= $distrito_sucursal->provincia;
        $departamento_sucursal= $provincia_sucursal->departamento;
        $provincias=Provincia::where('departamento_id',$departamento_sucursal->id)->pluck('nombre','id')->all();
        $distritos=Distrito::where('provincia_id',$provincia_sucursal->id)->pluck('nombre','id')->all();
        return view('editor.sucursales.edit',compact('sucursal','departamentos','provincia_sucursal','departamento_sucursal','provincias','distritos'));
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
            'email' =>'email|nullable',
            'nombres_representante_legal'=>'required',
            'email_representante_legal'=>'email|nullable',
            'dni_representante_legal'=>'digits:8|required',
            'nombres_responsable_tecnico'=>'required',
            'email_responsable_tecnico'=>'email|nullable',
            'dni_responsable_tecnico'=>'digits_between:5,8|required',
            'email_responsable_tecnico_2'=>'email|nullable',
            'dni_responsable_tecnico_2'=>'digits_between:5,8|nullable',
            'email_responsable_contabilidad'=>'email|nullable',
            'dni_responsable_contabilidad'=>'digits:8|nullable',
        ]);

        $input = $request->all();
        unset($input['departamento']);
        unset($input['provincia']);
        $sucursal = SucursalCliente::find($id);
        $sucursal->update($input);

        return redirect()->route('clientes.index')
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
        SucursalCliente::find($id)->delete();
        return redirect()->route('clientes.index')
            ->with('success','La sucursal fue eliminada correctamente');
    }
}
