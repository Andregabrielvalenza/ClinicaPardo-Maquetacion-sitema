<?php

namespace App\Http\Controllers;

use App\Membresia;
use App\MembresiaVigencia;
use App\Plan;
use App\Referido;
use App\User;
use App\UserCompra;
use App\PlanVariacion;
use App\UserPreferencia;
use App\UsuarioMembresia;
use App\Vigencia;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;
use DB;
use Carbon\Carbon;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:pago-membresia', ['only' => ['procesarPago']]);
    }

    public function procesarPago($token, $email, $idmembresia, $idmembresiavigencia, $monto, $moneda, $codigo_ref, Request $request)
    {
        //if ($request->ajax()) {
            $membresia = Membresia::findOrFail($idmembresia);
            $membresia_vigencia = MembresiaVigencia::findOrFail($idmembresiavigencia);
            $precio = $membresia_vigencia->precio;
            $nombre_vigencia=$membresia_vigencia->vigencia->nombre;
            $fecha_actual=Carbon::now();
            $id_user_lider=null;

            if ($codigo_ref != "0") {
                $ref = User::where('codigo_registro', $codigo_ref)->first();
                if ($ref==null) {
                    return response()->json(['estado' => 0, 'titulo' => 'Oppsssss! :(', 'mensaje' => 'El codigo de Agente ingresado no existe, no se aplicaron cargos en su tarjeta!']);
                }
                else
                {
                    // Guardamos en una variable el id del usuario lider
                    $id_user_lider=$ref->id;
                }
            }

            if ($monto==$precio) {
                include(app_path() . '/Functions/Requests/library/Requests.php');
                \Requests::register_autoloader();
                include(app_path() . '/Functions/culqi-php/lib/culqi.php');
                // Peticion Culqi
                try {
                    $secret_api_key="sk_test_4MYgHV5kkkp8j8DI";
                    $culqi = new \Culqi\Culqi(array('api_key' => $secret_api_key));
                    $data = array('plan' => $membresia->nombre, 'vigencia' => $nombre_vigencia, 'codigo_registro'=>$codigo_ref);
                    $charge = $culqi->Charges->create(
                        array(
                            "metadata " => $data,
                            "amount" => $precio*100,
                            "currency_code" => $moneda,
                            "description" => $membresia->nombre."-".$nombre_vigencia,
                            "email" => $email,
                            "source_id" => $token
                        )
                    );

                    //registramos la venta en el usuario
                    \DB::beginTransaction();
                    //creamos las preferencias del usuario
                    try {
                        $user = Auth::user();

                        UsuarioMembresia::create(["id_membresia_vigencia" => $membresia_vigencia->id, "id_user" => $user->id, "fecha_compra" => $fecha_actual, "transaccion" => $charge->id, "precio_compra" => $precio, "igv" => $precio*18/100]);

                        \DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                        $user->assignRole($membresia->rol);
                        $user->givePermissionTo('compra-exitosa');

                        if($id_user_lider!=null)
                        {
                            // Registramos la relacion del codigo de referido con el id del usuario en la tabla Referidos
                            Referido::create(['id_lider' => $id_user_lider, 'id_miembro' => $user->id, 'estado' => 0]);
                        }

                    }catch(ValidationException $e){
                        // Rollback and then redirect
                        // back to form with errors
                        \DB::rollback();
                        return response()->json(['estado' => 0, 'titulo' => 'Oppsssss! :(', 'mensaje' => $e->getErrors()]);
                        /*return Redirect::to('/register')
                            ->withErrors( $e->getErrors() )
                            ->withInput();*/
                    } catch(\Exception $e)
                    {
                        \DB::rollback();
                        throw $e;
                    }
                    \DB::commit();
                    return response()->json(['estado' => 1, 'titulo' => 'Yeapp :)', 'mensaje' => 'Tu compra ha sido procesado con exito. Muchas Gracias por confiar en ASPRO']);
                    //return response()->json(["respuesta" => $charge, "estado" => 1]);
                }
                catch (Exception $e)
                {
                    return response()->json(['estado' => 0, 'titulo' => 'Oppsssss! :(', 'mensaje' => json_encode($e->getMessage())]);
                }

            }
            else
            {
                return response()->json(['estado' => 0, 'titulo' => 'Oppsssss! :(', 'mensaje' => 'No trate de vulnerar el sistema, estamos grabando su IP']);
            }
       // }
    }


}
