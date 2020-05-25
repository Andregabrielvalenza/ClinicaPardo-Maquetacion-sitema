<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conductor;
use App\EmpresaSeguro;
use App\UserEmpresa;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        /*$this->middleware('permission:conductore-list', ['only' => ['index','show']]);
        $this->middleware('permission:conductore-create', ['only' => ['create','store']]);
        $this->middleware('permission:conductore-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:conductore-delete', ['only' => ['destroy']]);*/
    }

    public function guardar_comision_empresa(Request $request)
    {
        if ($request->ajax()) {
            if (!$request->seguro_id || !$request->empresa_id || !$request->comision) {
                return response()->json(['titulo' => 'Error en el proceso', 'mensaje' => 'No pudimos actualizar la informacion, parametros requeridos', 'estado' => 0]);
            } else {
                EmpresaSeguro::create(['empresa_id'=>$request->empresa_id, 'seguro_id'=>$request->seguro_id, 'comision'=>$request->comision]);
                return response()->json(['titulo' => 'Proceso finalizado', 'mensaje' => 'La información se actualizo con exito', 'estado' => 1]);
            }
        }
    }

    public function actualizar_comision_empresa(Request $request)
    {
        if ($request->ajax()) {
            if (!$request->seguro_id || !$request->empresa_id || !$request->comision) {
                return response()->json(['titulo' => 'Error en el proceso', 'mensaje' => 'No pudimos actualizar la informacion, parametros requeridos', 'estado' => 0]);
            } else {
                $data=EmpresaSeguro::where('empresa_id',$request->empresa_id)->where('seguro_id',$request->seguro_id)->first();
                if ($data) {
                    $data->update(['comision' => $request->comision]);
                    return response()->json(['titulo' => 'Proceso finalizado', 'mensaje' => 'La información se actualizo con exito', 'estado' => 1]);
                }else return response()->json(['titulo' => 'Error en el proceso', 'mensaje' => 'Objeto no encontrado', 'estado' => 0]);
            }
        }
    }

    public function eliminar_comision_empresa(Request $request)
    {
        if ($request->ajax()) {
            if (!$request->seguro_id || !$request->empresa_id ) {
                return response()->json(['titulo' => 'Error en el proceso', 'mensaje' => 'No pudimos actualizar la informacion, parametros requeridos', 'estado' => 0]);
            } else {
                $data=EmpresaSeguro::where('empresa_id',$request->empresa_id)->where('seguro_id',$request->seguro_id)->first();
                if ($data) {
                    $data->delete();
                    return response()->json(['titulo' => 'Proceso finalizado', 'mensaje' => 'La información se actualizo con exito', 'estado' => 1]);
                }else return response()->json(['titulo' => 'Error en el proceso', 'mensaje' => 'Objeto no encontrado', 'estado' => 0]);
            }
        }
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
        return view('editor.empresas.create');
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
            'nombre_comercial' => 'required',
        ]);

        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $empresa = UserEmpresa::create($input);

        return redirect()->route('redes')
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
