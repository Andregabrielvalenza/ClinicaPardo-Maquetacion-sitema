<?php

namespace App\Http\Controllers\Auth;

use App\UserPreferencia;
use Auth;
use App\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SocialAuthController extends Controller
{
    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user();
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user); // Login y redirección
        } else {
            if ($user = $user = User::where('provider_id', $social_user->id)->first()){
                return $this->authAndRedirect($user); // Login y redirección
            }else {
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                \DB::beginTransaction();
                //creamos las preferencias del usuario
                try {
                    $codigo_venta=$this->generate_string($permitted_chars, 10);
                    $user=User::create([
                        'name' => $social_user->name,
                        'email' => $social_user->email,
                        'imagen' => $social_user->avatar,
                        'codigo_registro' => $codigo_venta,
                        'provider' => $provider,
                        'provider_id' => $social_user->id,
                    ]);
                    $user->assignRole(['Gratuito']);
                    // asignamos permisos para que pueda pagar
                    $user->givePermissionTo('pago-membresia');
                } catch(ValidationException $e){
                    // Rollback and then redirect
                    // back to form with errors
                    \DB::rollback();
                    return Redirect::to('/register')
                        ->withErrors( $e->getErrors() )
                        ->withInput();
                } catch(\Exception $e)
                {
                    \DB::rollback();
                    throw $e;
                }
                \DB::commit();
                return $this->authAndRedirect($user); // Login y redirección
            }
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/verify-account');
    }
}
