<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conductor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:conductore-list', ['only' => ['index','show']]);
        $this->middleware('permission:conductore-create', ['only' => ['create','store']]);
        $this->middleware('permission:conductore-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:conductore-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Conductor::all();
        return view('editor.conductores.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.conductores.create');
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
            'nombres' => 'required',
            'dni' => 'nullable|digits:8|unique:conductores,dni',
            'email' => 'nullable|email'
        ]);

        $input = $request->all();

        $conductor = Conductor::create($input);

        return redirect()->route('conductores.index')
            ->with('success','El conductor se registro correctamente');
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
        $conductor = Conductor::find($id);
        return view('editor.conductores.edit',compact('conductor'));
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
            'nombres' => 'required',
            'dni' => 'nullable|digits:8|unique:conductores,dni,'.$id,
            'email' => 'nullable|email'
        ]);

        $input = $request->all();
        $conductor = Conductor::find($id);
        $conductor->update($input);

        return redirect()->route('conductores.index')
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
        Conductor::find($id)->delete();
        return redirect()->route('conductores.index')
            ->with('success','El Conductor fue eliminado correctamente');
    }
}
