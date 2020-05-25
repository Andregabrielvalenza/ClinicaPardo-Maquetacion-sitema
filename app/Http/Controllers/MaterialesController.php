<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MaterialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:materiale-list', ['only' => ['index','show']]);
        $this->middleware('permission:materiale-create', ['only' => ['create','store']]);
        $this->middleware('permission:materiale-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:materiale-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Material::all();
        return view('editor.materiales.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.materiales.create');
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
            'nombre' => 'required'
        ]);

        $input = $request->all();

        $material = Material::create($input);

        return redirect()->route('materiales.index')
            ->with('success','El material se registro correctamente');
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
        $material = Material::find($id);
        return view('editor.materiales.edit',compact('material'));
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
            'nombre' => 'required'
        ]);

        $input = $request->all();
        $material = Material::find($id);
        $material->update($input);

        return redirect()->route('materiales.index')
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
        Material::find($id)->delete();
        return redirect()->route('materiales.index')
            ->with('success','El Material fue eliminado correctamente');
    }
}
