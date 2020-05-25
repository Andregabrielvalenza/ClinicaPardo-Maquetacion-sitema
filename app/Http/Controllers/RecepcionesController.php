<?php

namespace App\Http\Controllers;

use App\Peligrosidad;
use App\Recepcion;
use App\Recipiente;
use App\Residuo;
use App\TipoCarga;
use Illuminate\Http\Request;
use DB;


class RecepcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:manifiesto-edit', ['only' => ['edit','update']]);

    }

    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $recepcion = Recepcion::find($id);
        return view('editor.recepciones.edit',compact('recepcion'));
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
            'nro_recipientes' => 'required|integer',
            'volumen' => 'between:0,99999.99|required',
            'guia_remision_remitente' => 'nullable'
        ]);

        $input = $request->all();

        $recepcion = Recepcion::find($id);
        $recepcion->update($input);

        //tenemos que actualizar el numero de guia de remision de remitente en todas las recepciones de la programacion
        $recepciones=Recepcion::where('programacion_id',$recepcion->programacion_id)->get();
        if (count($recepciones)>0){
            foreach ($recepciones as $recepcion){
                $recepcion->update(['guia_remision_remitente'=>$request->guia_remision_remitente]);
            }
        }

        return redirect()->route('almacen')
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
        /*Residuo::find($id)->delete();
        return redirect()->route('tipo-residuos.index')
            ->with('success','El tipo de residuo fue eliminado correctamente');*/
    }
}