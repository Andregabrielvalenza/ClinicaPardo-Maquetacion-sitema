<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/departamentos', 'HomeController@cargardepartamentos')->name('departamentos');
Route::get('/provincias', 'HomeController@cargarprovincias')->name('provincias');
Route::get('/distritos', 'HomeController@cargardistritos')->name('distritos');
Route::get('/clienteslista', 'HomeController@cargarclientes')->name('clienteslista');
Route::get('/sucursales', 'HomeController@cargarsucursales')->name('sucursales');*/

Auth::routes();
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::group(['middleware' => ['auth']], function() {

    /* routes de la clinica de pardo */
    Route::get('/verify-account', 'HomeController@index')->name('verify-account');
    Route::get('/crear-nueva-cita', 'HomeController@crearCita')->name('crear-nueva-cita');
    Route::get('/operacion-exitosa-cita-creada', 'HomeController@operacionExitosa')->name('operacion-exitosa');
    Route::get('/operacion-exitosa-agregar-paciente', 'HomeController@operacionExitosa1')->name('operacion-exitosa');
    Route::get('/operacion-exitosa-agregar-1-paciente', 'HomeController@operacionExitosa3')->name('operacion-exitosa');
    Route::get('/operacion-exitosa-registrar-doctor', 'HomeController@operacionExitosa2')->name('operacion-exitosa-registrar-doctor');
    Route::get('/calendario-cita', 'HomeController@calendarioCita')->name('calendario-cita');
    Route::get('/pacientes', 'HomeController@pacientes')->name('pacientes');
    Route::get('/perfil-paciente', 'HomeController@perfilPaciente')->name('perfil-paciente');
    Route::get('/perfil-doctor', 'HomeController@perfilDoctor')->name('perfil-doctor');
    Route::get('/doctores', 'HomeController@doctores')->name('doctores');
    Route::get('/registrar-doctor', 'HomeController@registrarDoctor')->name('registrar-doctor');
    Route::get('/emergencia-triage', 'HomeController@emergenciaTriage')->name('emergencia-triage');
    Route::get('/creacion-historia-clinica', 'HomeController@creacionHistoriaclinica')->name('creacion-historia-clinica');
    /* fin de la routes de la clinica pardo*/

    Route::get('configuracion-estructura', 'HomeController@ConfigurarEstrucura');
    Route::get('configuracion-productos', 'HomeController@ConfigurarProductos');
    Route::get('compra-exitosa', 'HomeController@compraExitosa')->name('compra-exitosa');
    Route::get('configurar-datos-importante', 'HomeController@configDatos')->name('configurar-datos-importante');
    Route::post('guardar-datos-importante', 'HomeController@guardaDatos')->name('guardar-datos-importante');
    Route::get('configuracion-estructura-agente', 'HomeController@ConfigurarEstrucuraAgente')->name('configuracion-estructura-agente');
    Route::get('configuracion-productos-agente', 'HomeController@ConfigurarProductosAgente');
    Route::get('configuracion-productos-empresa', 'HomeController@ConfigurarProductosEmpresa')->name('configuracion-productos-empresa');
    Route::post('guardar-config-planes-agente', 'HomeController@guardarConfigPlanesAgente')->name('guardar-config-planes-agente');
    Route::post('guardar-config-planes-empresa', 'HomeController@guardarConfigPlanesEmpresa')->name('guardar-config-planes-empresa');
    Route::post('configuracion-estructura-agente', 'HomeController@addAgenteRed')->name('add-agente-red');
    Route::get('/verify-account', 'HomeController@index')->name('verify-account');
    Route::get('/configurar-primer-agente', 'HomeController@configPrimerAgente')->name('configurar-primer-agente');
    Route::post('/guardar-primer-agente', 'HomeController@GuardarPrimerAgente')->name('guardar-primer-agente');
    Route::get('/obtener-precio-membresias/{id}', 'HomeController@obtenerPrecio');
    Route::get('/verify-code/{codigo_r}', 'HomeController@verificar_codigo')->name('admin.verificar_codigo');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/redes', 'HomeController@redes')->name('redes');
    Route::get('/procesar-pago/{token}/{email}/{membresia}/{membresiavigencia}/{monto}/{moneda}/{codigo_ref}', 'PagosController@procesarPago')->name('procesar-pago');
    Route::resource('empresas','EmpresaController');
    Route::get('/guardar_comision_empresa', 'EmpresaController@guardar_comision_empresa')->name('admin.guardar_comision_empresa');
    Route::get('/actualizar_comision_empresa', 'EmpresaController@actualizar_comision_empresa')->name('admin.actualizar_comision_empresa');
    Route::get('/eliminar_comision_empresa', 'EmpresaController@eliminar_comision_empresa')->name('admin.eliminar_comision_empresa');
    Route::resource('agentes','AgentesController');


    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('sucursales', 'SucursalesController');
    Route::get('provincias/get_by_departamento', 'SucursalesController@getprovincias')->name('admin.provincias.get_by_departamento');
    Route::get('distritos/get_by_provincia', 'SucursalesController@getdistritos')->name('admin.distritos.get_by_provincia');
    Route::resource('peligrosidad', 'PeligrosidadController');
    Route::resource('tipo-residuos', 'ResiduosController');
    Route::resource('conductores', 'ConductoresController');
    Route::resource('vehiculos', 'VehiculosController');
    Route::resource('plantas', 'PlantasController');
    Route::resource('sucursales-planta', 'SucursalesPlantaController');
    Route::resource('programaciones', 'ProgramacionesController');
    Route::get('sucursales_combo/get_by_cliente', 'ProgramacionesController@getsucursales')->name('admin.sucursales.get_by_cliente');
    Route::get('procesar-programacion/{programacion}', 'ProgramacionesController@procesar')->name('procesar-programacion');
    Route::post('registrar-recepcion', 'ProgramacionesController@registrarrecepcion')->name('registrar-recepcion');
    Route::resource('recepciones', 'RecepcionesController');
    Route::resource('materiales', 'MaterialesController');
    Route::resource('recipientes', 'RecipientesController');
    Route::get('residuo-data', 'ProgramacionesController@getresiduodata')->name('admin.get_residuo_data');
    Route::get('almacen', 'ProgramacionesController@almacen')->name('almacen');
    Route::resource('manifiestos', 'ManifiestoController');
    Route::get('manifiestos-historial', 'ManifiestoController@historial')->name('manifiestos.historial');
    Route::get('planta/get_by_sucursal', 'ManifiestoController@getdataplanta')->name('admin.planta.get_by_sucursal');
    Route::resource('envios', 'EnviosController');
    Route::get('envios-historial', 'EnviosController@historial')->name('envios.historial');
    Route::resource('liquidaciones', 'LiquidacionesController');
    Route::resource('certificados', 'CertificadosController');
    Route::get('clonar-programacion/{programacion}', 'ProgramacionesController@clonar')->name('clonar-programacion');

});


