<?php

namespace App\Http\Controllers;


use App\Empresa;
use App\EmpresaPlan;
use App\Membresia;
use App\MembresiaVigencia;
use App\Plan;
use App\TiposDeSeguro;
use App\User;
use App\UsuarioEmpresa;
use App\UsuarioEmpresaPlan;
use App\UsuarioMembresia;
use App\Vigencia;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('permission:home', ['only' => ['index','verificar_codigo']]);
        //$this->middleware('permission:dashboard', ['only' => ['dashboard']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /* clinica pardo */

    public function index()
    {
        return view('panel-principal-pardo');
    }
    public function crearCita()
    {
        return view('crear-cita-pardo');
    }
    public function operacionExitosa()
    {
        return view('operacion-exitosa-citacreada-pardo');
    }
    public function operacionExitosa1()
    {
        return view('operacion-exitosa-agregarpaciente-pardo');
    }
    public function operacionExitosa2()
    {
        return view('operacion-exitosa-registrardoctor-pardo');
    }
    public function operacionExitosa3()
    {
        return view('operacion-exitosa-citacreada1-pardo');
    }
    public function calendarioCita()
    {
        return view('calendario-citas-pardo');
    }
    public function pacientes()
    {
        return view('pacientes-pardo');
    }
    public function perfilPaciente()
    {
        return view('perfil-pacientes-pardo');
    }
    public function perfilDoctor()
    {
        return view('perfil-doctor-pardo');
    }
    public function doctores()
    {
        return view('doctores-pardo');
    }
    public function registrarDoctor()
    {
        return view('registrar-doctor-pardo');
    }
    public function emergenciaTriage()
    {
        return view('emergencia-trige-pardo');
    }
    public function creacionHistoriaclinica()
    {
        return view('creacion-historiaclinica-pardo');
    }
    /* Fin de la Clinica pardo  */

    public function compraExitosa()
    {
        $user=Auth::user();
        $id_usuario=$user->id;
        $validar=UsuarioMembresia::where('id_user',$id_usuario)->latest('fecha_compra')->first();
        // Si validar es mayor a 0 es porque tiene registros de membresias
        if($validar!=null)
        {
            // Como tiene registro validamos que no este vencido
            $fecha_compra= Carbon::parse($validar->fecha_compra);
            $vigencia=$validar->membresiaVigencia->vigencia->cant_meses;

            // si la vigencia es mayor a 1 aplicar addMonths si es igual a 1 addMonth
            if($vigencia==1)
            {
                // addMonth es una funcion de carbon add 1 mes
                $fecha_limite=$fecha_compra->addMonth();
            }
            else
            {
                // addMonths es una funcion de carbon y espera un parametro int con la cantidad de mes a sumar
                $fecha_limite=$fecha_compra->addMonths($vigencia);
            }

            // Sacamos la fecha actual
            $fecha_actual= Carbon::now();

            // retorna un boleano true o false
            if($fecha_limite->gte($fecha_actual)){
                // Paso la validacion lo mandamos a Compra exitosa
                return view('compra-exitosa');
            }
            else
            {
                // No paso la validacion lo mandamos a la pagina de las membresias
                $membresias=Membresia::orderBy('id','ASC')->get();
                $vigencias=Vigencia::all();
                return view('select-plan',compact('membresias','vigencias'));
            }
        }
        else
        {
            // No tienen ninguna membresia Mostrar la pagina de las membresias
            $membresias=Membresia::orderBy('id','ASC')->get();
            $vigencias=Vigencia::all();
            return view('select-plan',compact('membresias','vigencias'));
        }

    }

    public function configDatos()
    {
        //Verificamos que tipo de membresia compro Agente o Empresa
        $user=Auth::user();
        $id_usuario=$user->id;
        $validar=UsuarioMembresia::where('id_user',$id_usuario)->latest('fecha_compra')->first();

        // Si validar es mayor a 0 es porque tiene registros de membresias
        if($validar!=null)
        {
            // Como tiene registro validamos que no este vencido
            $fecha_compra= Carbon::parse($validar->fecha_compra);
            $vigencia=$validar->membresiaVigencia->vigencia->cant_meses;

            // si la vigencia es mayor a 1 aplicar addMonths si es igual a 1 addMonth
            if($vigencia==1)
            {
                // addMonth es una funcion de carbon add 1 mes
                $fecha_limite=$fecha_compra->addMonth();
            }
            else
            {
                // addMonths es una funcion de carbon y espera un parametro int con la cantidad de mes a sumar
                $fecha_limite=$fecha_compra->addMonths($vigencia);
            }

            // Sacamos la fecha actual
            $fecha_actual= Carbon::now();

            // retorna un boleano true o false
            if($fecha_limite->gte($fecha_actual)){
                // Paso la validacion lo mandamos al formulario de datos que faltan de Agente o Empresa
                if($validar->membresiaVigencia->membresia->id == 2 || $validar->membresiaVigencia->membresia->id == 3)
                {
                    // Si entra aqui es Agente
                    // Tenemos que validar si se registro con una plataforma externa FB o Google
                    if($user->telefono==null)
                    {
                        // Se registro con una plataforma externa
                        $tipo_registro=0;
                        return view('datos-importantes', compact('tipo_registro'));
                    }
                    else
                    {
                        // le creamos una empresa basica y lo relacionamos con dicha empresa
                        $new_empresa=new Empresa;
                        $new_empresa->nombre_comercial=$user->name;
                        $new_empresa->ruc='';
                        $new_empresa->telf=$user->telefono;
                        $new_empresa->correo=$user->email;
                        $new_empresa->direccion='';
                        $new_empresa->save();

                        // asociamos el user a la empresa
                        $new_user_empresa=new UsuarioEmpresa;
                        $new_user_empresa->id_user=$id_usuario;
                        $new_user_empresa->id_empresa=$new_empresa->id;
                        $new_user_empresa->fecha_add=$fecha_actual;
                        $new_user_empresa->cargo='Agente';
                        $new_user_empresa->codigo_acceso='';
                        $new_user_empresa->estado=1;
                        $new_user_empresa->nickname=$user->name;
                        $new_user_empresa->save();

                        // asignamos permisos para que pueda configurar su cuenta
                        $user->givePermissionTo('config-cuenta-agente');

                        // Lo enviamos a la vista donde le preguntamos si pertecena a una red
                        return redirect()->route('configuracion-estructura-agente');
                    }
                }
                else
                {
                    // Si entra aqui es Empresa
                    $tipo_registro=1;
                    return view('datos-importantes', compact('tipo_registro'));
                }

            }
            else
            {
                // No paso la validacion lo mandamos a la pagina de las membresias
                $membresias=Membresia::orderBy('id','ASC')->get();
                $vigencias=Vigencia::all();
                return view('select-plan',compact('membresias','vigencias'));
            }
        }
        else
        {
            // No tienen ninguna membresia Mostrar la pagina de las membresias
            $membresias=Membresia::orderBy('id','ASC')->get();
            $vigencias=Vigencia::all();
            return view('select-plan',compact('membresias','vigencias'));
        }
    }

    public function guardaDatos(Request $request)
    {
        $user=Auth::user();
        $id_usuario=$user->id;
        // Sacamos la fecha actual
        $fecha_actual= Carbon::now();
        if($request->tipo_registro==0)
        {
            // Validar
            $validatedData = $request->validate([
                'telefono'=>'required',
            ]);

            // Es un agente
            $update_user=User::find($id_usuario);
            $update_user->telefono=$request->telefono;
            $update_user->save();

            // Le creamos una empresa y luego asociamos al agente con su empresa basica
            $new_empresa=new Empresa;
            $new_empresa->nombre_comercial=$user->name;
            $new_empresa->ruc='';
            $new_empresa->telf=$request->telefono;
            $new_empresa->correo=$user->email;
            $new_empresa->direccion='';
            $new_empresa->save();

            // asociamos el user a la empresa
            $new_user_empresa=new UsuarioEmpresa;
            $new_user_empresa->id_user=$id_usuario;
            $new_user_empresa->id_empresa=$new_empresa->id;
            $new_user_empresa->fecha_add=$fecha_actual;
            $new_user_empresa->cargo='Agente';
            $new_user_empresa->codigo_acceso='';
            $new_user_empresa->estado=1;
            $new_user_empresa->nickname=$user->name;
            $new_user_empresa->save();

            // asignamos permisos para que pueda configurar su cuenta
            $user->givePermissionTo('config-cuenta-agente');

            // Lo enviamos a la configuracion basica de su cuenta como agente
            return redirect()->route('configuracion-estructura-agente');
        }
        else
        {
            // Validar
            $validatedData = $request->validate([
                'nombre_comercial'=>'required',
                'ruc'=>'required',
                'telf'=>'required',
                'correo'=>'required',
                'direccion'=>'required',
            ]);

            // Es una empresa
            $new_empresa=new Empresa;
            $new_empresa->nombre_comercial=$request->nombre_comercial;
            $new_empresa->ruc=$request->ruc;
            $new_empresa->telf=$request->telf;
            $new_empresa->correo=$request->correo;
            $new_empresa->direccion=$request->direccion;
            $new_empresa->save();

            // asociamos el user a su empresa
            $new_user_empresa=new UsuarioEmpresa;
            $new_user_empresa->id_user=$id_usuario;
            $new_user_empresa->id_empresa=$new_empresa->id;
            $new_user_empresa->fecha_add=$fecha_actual;
            $new_user_empresa->cargo='Lider de la Empresa - '.$new_empresa->nombre_comercial;
            $new_user_empresa->codigo_acceso='';
            $new_user_empresa->estado=1;
            $new_user_empresa->nickname=$user->name;
            $new_user_empresa->save();

            // Lo enviamos a la configuracion basica de su cuenta como empresa

            // asignamos permisos para que pueda configurar su cuenta
            $user->givePermissionTo('config-cuenta-empresa');

            return redirect()->route('configuracion-productos-empresa');
        }
    }

    public function ConfigurarEstrucuraAgente()
    {
        return view('configurar-estructura-agente');
    }

    public function ConfigurarProductosEmpresa()
    {
        $tipos_de_seguros=TiposDeSeguro::all();
        return view('configurar-produtos-empresa', compact('tipos_de_seguros'));
    }

    public function ConfigurarProductosAgente()
    {
        $tipos_de_seguros=TiposDeSeguro::all();
        return view('configurar-produtos-agente', compact('tipos_de_seguros'));
    }

    public function guardarConfigPlanesAgente(Request $request)
    {
        $validatedData = $request->validate([
            'planes'=>'required|array',
            'comision'=>'required|array',
            'comision.*'=>'numeric|min:1|max:100'
        ]);

        $user=Auth::user();
        $planes=$request->planes;
        $comisiones=$request->comision;
        $id_empresa=$user->primerEmpresa->Empresa->id;

        // For para recorrer los array de planes y comisiones
        for ($i=0;$i<count($planes);$i++)
        {
            $new_empresa_agente_basico_plan=new EmpresaPlan;
            $new_empresa_agente_basico_plan->id_empresa=$id_empresa;
            $new_empresa_agente_basico_plan->id_plan=$planes[$i];
            $new_empresa_agente_basico_plan->comision=$comisiones[$i];
            $new_empresa_agente_basico_plan->save();
        }

        // le damos permiso para que entre al dashboard
        $user->givePermissionTo('dashboard');

        return redirect()->route('dashboard');
    }

    public function guardarConfigPlanesEmpresa(Request $request)
    {
        $validatedData = $request->validate([
            'planes'=>'required|array',
            'comision'=>'required|array',
            'comision.*'=>'numeric|min:1|max:100'
        ]);

        $user=Auth::user();
        $planes=$request->planes;
        $comisiones=$request->comision;
        $id_empresa=$user->primerEmpresa->Empresa->id;

        // For para recorrer los array de planes y comisiones
        for ($i=0;$i<count($planes);$i++)
        {
            $new_empresa_agente_basico_plan=new EmpresaPlan;
            $new_empresa_agente_basico_plan->id_empresa=$id_empresa;
            $new_empresa_agente_basico_plan->id_plan=$planes[$i];
            $new_empresa_agente_basico_plan->comision=$comisiones[$i];
            $new_empresa_agente_basico_plan->save();
        }

        // asignamos permisos para que pueda configurar su primer agente
        $user->givePermissionTo('config-primer-agente');

        return redirect()->route('configurar-primer-agente');
    }

    public function configPrimerAgente()
    {
        $user_empresa=Auth::user();
        $tipos_de_seguros=TiposDeSeguro::all();

        return view('add-primer-agente',compact('user_empresa','tipos_de_seguros'));
    }

    public function GuardarPrimerAgente(Request $request)
    {
        $validatedData = $request->validate([
            'alias'=>'required',
            'cargo'=>'required',
            'codigo'=>'required',
            'planes'=>'required|array',
            'comision'=>'required|array',
            'comision.*'=>'numeric|min:1|max:100'
        ]);

        $alias=$request->alias;
        $cargo=$request->cargo;
        $codigo=$request->codigo;

        // Sacamos la fecha actual
        $fecha_actual= Carbon::now();
        $user=Auth::user();
        $id_empresa=$user->primerEmpresa->Empresa->id;

        // registramos al agente en usuarioempresa
        $new_agente_empresa=new UsuarioEmpresa;
        $new_agente_empresa->id_empresa=$id_empresa;
        $new_agente_empresa->fecha_add=$fecha_actual;
        $new_agente_empresa->cargo=$cargo;
        $new_agente_empresa->codigo_acceso=$codigo;
        $new_agente_empresa->estado=0;
        $new_agente_empresa->nickname=$alias;
        $new_agente_empresa->save();

        // registramos sus comisiones
        $planes=$request->planes;
        $comisiones=$request->comision;

        // For para recorrer los array de planes y comisiones
        for ($i=0;$i<count($planes);$i++)
        {
            $new_empresa_agente_basico_plan=new UsuarioEmpresaPlan;
            $new_empresa_agente_basico_plan->id_usuario_empresa=$new_agente_empresa->id;
            $new_empresa_agente_basico_plan->id_plan=$planes[$i];
            $new_empresa_agente_basico_plan->comision=$comisiones[$i];
            $new_empresa_agente_basico_plan->save();
        }

        // Asignamos el permiso de que registro su primer agente
        $user->givePermissionTo('add-primer-agente');

        // Asignamos el permiso del dashboard
        $user->givePermissionTo('dashboard');

        return redirect()->route('dashboard');
    }

    public function addAgenteRed(Request $request)
    {
        $validatedData = $request->validate([
            'codigo'=>'required'
        ]);
        $user=Auth::user();
        $codigo=$request->codigo;
        $validamos=UsuarioEmpresa::where('codigo_acceso',$codigo)->first();

        if($validamos!=null)
        {
            if($validamos->id_user==null)
            {
                // Actualizamos el usuarioempresa
                $update=UsuarioEmpresa::find($validamos->id);
                $update->id_user=$user->id;
                $update->estado=1;
                $update->save();

                // le damos permiso para que entre al dashboard
                $user->givePermissionTo('dashboard');

                return redirect()->route('dashboard');
            }
            else
            {
                $mensaje="El codigo ingresado se encuentra registrado en otro usuario (Deben asignarle uno nuevo).";
                return view('configurar-estructura-agente',compact('mensaje'));
            }
        }
        else
        {
            $mensaje="El codigo ingresado no se encuentra registrado (Debe respetar minusculas y mayusculas).";
            return view('configurar-estructura-agente',compact('mensaje'));
        }

    }

    public function ConfigurarEstrucura()
    {
        return view('configurar-estructura');
    }

    public function ConfigurarProductos()
    {
        return view('configurar-produtos');
    }


    public function dashboard()
    {
        $user=Auth::user();

        if($user->can('pago-membresia')==true && $user->can('compra-exitosa')==false)
        {
            // No tienen ninguna membresia Mostrar la pagina de las membresias
            $membresias=Membresia::orderBy('id','ASC')->get();
            $vigencias=Vigencia::all();
            return view('select-plan',compact('membresias','vigencias'));
        }
        elseif (($user->can('compra-exitosa')==true && ($user->can('config-cuenta-agente')==false && $user->can('config-cuenta-empresa')==false)) && $user->can('dashboard')==false)
        {
            return redirect()->route('compra-exitosa');
        }
        elseif (($user->can('config-cuenta-agente')==true && $user->can('config-cuenta-empresa')==false) && $user->can('dashboard')==false)
        {
            return redirect()->route('configuracion-estructura-agente');
        }
        elseif (($user->can('config-cuenta-empresa')==true && $user->can('config-cuenta-agente')==false) && $user->can('config-primer-agente')==false)
        {
            return redirect()->route('configuracion-productos-empresa');
        }
        elseif (($user->can('config-cuenta-empresa')==true && $user->can('config-primer-agente')==true) && $user->can('add-primer-agente')==false )
        {
            return redirect()->route('configurar-primer-agente');
        }
        elseif ($user->can('dashboard'))
        {
            // Si pasa la validacion lo enviamos al dashboard
            return view('dashboard-principal');
        }
    }

    public function obtenerPrecio(Request $request,$id)
    {
        if($request->ajax())
        {
            $membresias=MembresiaVigencia::where('id_vigencia',$id)->get();
            return response()->json(['membresias' => $membresias]);
        }
    }

    public function redes(){
        $user=Auth::user();
        $validar=UsuarioMembresia::where('id_user',$user->id)->latest('fecha_compra')->first();

        if($validar!=null)
        {
            // Como tiene registro validamos que no este vencido
            $fecha_compra= Carbon::parse($validar->fecha_compra);
            $vigencia=$validar->membresiaVigencia->vigencia->cant_meses;

            // si la vigencia es mayor a 1 aplicar addMonths si es igual a 1 addMonth
            if($vigencia==1)
            {
                // addMonth es una funcion de carbon add 1 mes
                $fecha_limite=$fecha_compra->addMonth();
            }
            else
            {
                // addMonths es una funcion de carbon y espera un parametro int con la cantidad de mes a sumar
                $fecha_limite=$fecha_compra->addMonths($vigencia);
            }

            // Sacamos la fecha actual
            $fecha_actual= Carbon::now();

            // retorna un boleano true o false
            if($fecha_limite->gte($fecha_actual)){
                // Paso la validacion lo mandamos al Dashboard
                return view('inicio-usuario',compact('user','validar'));
            }
            else
            {
                // No paso la validacion lo mandamos a la pagina de las membresias
                $membresias=Membresia::orderBy('id','ASC')->get();
                $vigencias=Vigencia::all();
                return view('select-plan',compact('membresias','vigencias'));
            }
        }
        else
        {
            // No paso la validacion lo mandamos a la pagina de las membresias
            $membresias=Membresia::orderBy('id','ASC')->get();
            $vigencias=Vigencia::all();
            return view('select-plan',compact('membresias','vigencias'));
        }
    }

    public function verificar_codigo(Request $request, $codigo_r){
        if ($request->ajax()) {
            $nombre="";
            if (!$codigo_r) {
                $estado = 0;
                $titulo = "Oppsssss :(";
                $mensaje = "Olvidaste ingresar el codigo";
            }else {
                $code = User::where('codigo_registro', $codigo_r)->first();
                if ($code)
                {
                    $estado = 1;
                    $titulo = "Yeapp :)";
                    $mensaje = "El codigo ingresado es valido.";
                    $nombre=$code->name;
                }
                else
                {
                    $estado = 0;
                    $titulo = "Oppsssss :(";
                    $mensaje = "El codigo ingresado no pertenece a ningún agente, por favor verifica que hayas ingresado el codigo correctamente.";
                }
            }
            return response()->json(['estado' => $estado, 'titulo' => $titulo, 'mensaje' => $mensaje, 'nombre' => $nombre]);
        }
    }

}
