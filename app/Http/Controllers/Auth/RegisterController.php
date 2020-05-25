<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\UserPreferencia;
use App\UsuarioMembresia;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify-account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        \DB::beginTransaction();
        //creamos las preferencias del usuario
        try {
            $codigo_venta=$this->generate_string($permitted_chars, 10);
            $user=User::create([
                'name' => $data['name'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'codigo_registro' => $codigo_venta,
                'provider' => 'normal',
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


        return $user;
    }
}
