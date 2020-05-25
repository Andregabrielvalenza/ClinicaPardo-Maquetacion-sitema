<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Residuo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:cliente-list', ['only' => ['index','show']]);
        $this->middleware('permission:cliente-create', ['only' => ['create','store']]);
        $this->middleware('permission:cliente-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Cliente::all();
        return view('editor.clientes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $residuos=Residuo::pluck('nombre','id')->all();
        return view('editor.clientes.create',compact('residuos'));
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
            'ruc' => 'required|digits_between:8,11|unique:clientes,ruc',
            'residuos' => 'required'
        ]);

        $input = $request->all();

        $cliente = Cliente::create($input);
        $cliente->asignarResiduos($request->input('residuos'));

        return redirect()->route('clientes.index')
            ->with('success','El cliente se registro correctamente');
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
        $cliente = Cliente::find($id);
        $residuos=Residuo::pluck('nombre','id')->all();
        $clienteResiduos = $cliente->join('cliente_residuos','cliente_residuos.cliente_id','clientes.id')
            ->join('residuos','residuos.id','cliente_residuos.residuo_id')
            ->where('clientes.id',$id)
            ->pluck('residuos.id','residuos.nombre')->all();
        return view('editor.clientes.edit',compact('cliente','residuos','clienteResiduos'));
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
            'ruc' => 'required|digits_between:8,11|unique:clientes,ruc,'.$id,
            'residuos' => 'required'
        ]);

        $input = $request->all();
        $cliente = Cliente::find($id);
        $cliente->update($input);
        DB::table('cliente_residuos')->where('cliente_id',$id)->delete();
        $cliente->asignarResiduos($request->input('residuos'));

        return redirect()->route('clientes.index')
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
        Cliente::find($id)->delete();
        return redirect()->route('clientes.index')
            ->with('success','El Cliente fue eliminado correctamente');
    }
}
