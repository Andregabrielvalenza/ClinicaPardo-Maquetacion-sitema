<?php

namespace App\Http\Controllers;

use App\Peligrosidad;
use App\Recipiente;
use App\Residuo;
use App\TipoCarga;
use Illuminate\Http\Request;
use DB;


class ResiduosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:residuo-list', ['only' => ['index','show']]);
        $this->middleware('permission:residuo-create', ['only' => ['create','store']]);
        $this->middleware('permission:residuo-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:residuo-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Residuo::all();
        return view('editor.residuos.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipientes = Recipiente::pluck('nombre','id')->all();
        $peligrosidades = Peligrosidad::pluck('nombre','id')->all();
        $tiposcarga= TipoCarga::pluck('nombre','id')->all();
        return view('editor.residuos.create', compact('peligrosidades','tiposcarga','recipientes'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input('peligrosidades'));
        $this->validate($request, [
            'nombre' => 'required',
            'peligrosidades' => 'required',
            'recipientes' => 'required',
            'estado' => 'required'
        ]);

        $input = $request->all();
        $residuo = Residuo::create($input);
        $residuo->asignarPeligrosidad($request->input('peligrosidades'));
        $residuo->asignarRecipientes($request->input('recipientes'));

        return redirect()->route('tipo-residuos.index')
            ->with('success','El tipo de residuo se registro correctamente');
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
        $recipientes = Recipiente::pluck('nombre','id')->all();
        $peligrosidades = Peligrosidad::pluck('nombre','id')->all();
        $residuo = Residuo::find($id);
        $tiposcarga= TipoCarga::pluck('nombre','id')->all();
        $residuoPeligrosidad = $residuo->join('residuo_peligrosidades','residuo_peligrosidades.residuo_id','residuos.id')
            ->join('peligrosidades','peligrosidades.id','residuo_peligrosidades.peligrosidad_id')
            ->where('residuos.id',$id)
            ->pluck('peligrosidades.id','peligrosidades.nombre')->all();
        $residuoRecipiente = $residuo->join('residuo_recipientes','residuo_recipientes.residuo_id','residuos.id')
            ->join('recipientes','recipientes.id','residuo_recipientes.recipiente_id')
            ->where('residuos.id',$id)
            ->pluck('recipientes.id','recipientes.nombre')->all();
        //dd($residuoPeligrosidad);
        return view('editor.residuos.edit',compact('peligrosidades','residuo','residuoPeligrosidad','tiposcarga','recipientes','residuoRecipiente'));
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
            'nombre' => 'required',
            'peligrosidades' => 'required',
            'recipientes' => 'required',
            'estado' => 'required'
        ]);

        $input = $request->all();

        $residuo = Residuo::find($id);
        $residuo->update($input);
        DB::table('residuo_peligrosidades')->where('residuo_id',$id)->delete();
        $residuo->asignarPeligrosidad($request->input('peligrosidades'));

        DB::table('residuo_recipientes')->where('residuo_id',$id)->delete();
        $residuo->asignarRecipientes($request->input('recipientes'));

        return redirect()->route('tipo-residuos.index')
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
        Residuo::find($id)->delete();
        return redirect()->route('tipo-residuos.index')
            ->with('success','El tipo de residuo fue eliminado correctamente');
    }
}