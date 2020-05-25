<?php

namespace App\Http\Controllers;

use App\Material;
use App\Recipiente;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RecipientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:recipiente-list', ['only' => ['index','show']]);
        $this->middleware('permission:recipiente-create', ['only' => ['create','store']]);
        $this->middleware('permission:recipiente-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:recipiente-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Recipiente::all();
        return view('editor.recipientes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales=Material::pluck('nombre','id')->all();
        return view('editor.recipientes.create', compact('materiales'));
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
            'nombre' => 'required',
            'volumen' => 'nullable',
            'material_id'=>'required|integer'
        ]);

        $input = $request->all();

        $recipiente = Recipiente::create($input);

        return redirect()->route('recipientes.index')
            ->with('success','El Recipiente se registro correctamente');
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
        dd('jaja');
        $materiales=Material::pluck('nombre','id')->all();
        $recipiente=Recipiente::find($id);
        return view('editor.recipientes.edit',compact('materiales','recipiente'));
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
            'nombre' => 'required',
            'volumen' => 'nullable',
            'material_id'=>'required|integer'
        ]);

        $input = $request->all();
        $recipiente = Recipiente::find($id);
        $recipiente->update($input);

        return redirect()->route('recipientes.index')
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
        Recipiente::find($id)->delete();
        return redirect()->route('recipientes.index')
            ->with('success','El Recipiente fue eliminado correctamente');
    }
}
