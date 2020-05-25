<?php

namespace App\Http\Controllers;

use App\Peligrosidad;
use Illuminate\Http\Request;


class PeligrosidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:peligrosidade-list', ['only' => ['index','show']]);
        $this->middleware('permission:peligrosidade-create', ['only' => ['create','store']]);
        $this->middleware('permission:peligrosidade-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:peligrosidade-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Peligrosidad::all();
        return view('editor.peligrosidades.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.peligrosidades.create');
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

        $peli = Peligrosidad::create($input);

        return redirect()->route('peligrosidad.index')
            ->with('success','La peligrosidad se registro correctamente');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peligrosidad = Peligrosidad::find($id);
        return view('editor.peligrosidades.edit',compact('peligrosidad'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required'
        ]);

        $input = $request->all();
        $peli = Peligrosidad::find($id);
        $peli->update($input);

        return redirect()->route('peligrosidad.index')
            ->with('success','La informacion fue actualizada correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peligrosidad::find($id)->delete();
        return redirect()->route('peligrosidad.index')
            ->with('success','La peligrosidad fue eliminada correctamente');
    }
}