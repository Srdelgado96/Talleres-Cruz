<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/login-google', function () {

//     return Socialite::driver('google')->redirect();
// });

// Route::get('/google-callback', function () {
//     $user = Socialite::driver('google')->user();
//     $userExists = Empleado::where('external_id', $user->id)->where('external_auth', 'google')->first();
//     if ($userExists) {
//         Auth::login($userExists);
//     } else {
//         $empleadoNew =  Empleado::create([
//             'nombre' => $user->name,
//             'email' => $user->email,
//             'avatar' => $user->avatar,
//             'external_id' => $user->id,
//             'external_auth' => 'google',
//             'tipo' => 'O',
//         ]);
//         Auth::login($empleadoNew);
//     }
//     return redirect('/FormIncidencia'); // aqui llega logeado

// });

Route::get('/', 'indexController@index')->name('index');
Auth::routes();

//-----AREA CLIENTES---/

Route::ANY('/AreaCliente', 'indexController@areaClienteAverias')->name('areaClienteAverias');
Route::ANY('/areaClienteFacturas', 'indexController@areaClienteFacturas')->name('areaClienteFacturas');
Route::get('/FacturasPdfCliente/{id}', 'FacturaController@Generar_pdf')->name('FacturasCliente.pdf');
Route::ANY('/loginClienteModal', 'ClienteController@LoginCliente')->name('loginClienteModal');



//-----CLIENTES---/
Route::resource('Clientes', ClienteController::class)->middleware('auth.admin');
Route::any('/eliminarCliente/{id}', 'ClienteController@Destroy')->name('eliminarCliente')->middleware('auth.admin'); //se llama por ajax y se le pasa id
Route::any('/ModificarCliente', 'ClienteController@update')->name('ModificarCliente')->middleware('auth.admin'); //se llama por ajax y se le pasa id



//-----VEHICULOS---/
Route::resource('Vehiculos', VehiculoController::class)->middleware('auth.admin');
Route::ANY('/ModificarVehiculo', 'VehiculoController@update')->name('modificarVehiculo')->middleware('auth.admin'); //se llama por ajax y se le pasa id
Route::any('/eliminarVehiculo/{id}', 'VehiculoController@Destroy')->name('eliminarVehiculo')->middleware('auth.admin'); //se llama por ajax y se le pasa id


//-----AVERIAS---/
Route::get('/home', 'AveriaController@index')->name('home')->middleware('auth.admin');
Route::ANY('/ModificarAveria', 'AveriaController@PruebAupdate')->name('modificarAveria')->middleware('auth.admin');
Route::resource('Averias', AveriaController::class);
Route::any('/eliminarAveria/{id}', 'AveriaController@Destroy')->name('eliminarAveria')->middleware('auth.admin');
Route::any('/listarVehiculos/{id}', 'AveriaController@listarVehiculos')->name('listarVehiculos')->middleware('auth.admin');
Route::any('/listarVehiculosParaModificarAveria/{id}', 'AveriaController@listarVehiculosParaModificarAveria')->name('listarVehiculosModificarAveria')->middleware('auth.admin');
Route::any('/listarAveriasNuevaFactura/{id}', 'FacturaController@listarAveriasParaNuevaFactura')->name('listarAveriasParaNuevaFactura')->middleware('auth.admin');



//-----EMPLEADO---/
Route::ANY('/Login', 'indexController@LoginCliente')->name('LoginCliente');
Route::resource('Empleados', UserController::class)->middleware('auth.admin');;
Route::any('/EmpleadosEliminar/{id}', 'EmpleadoController@destroy')->name('eliminarEmpleado')->middleware('auth.admin');
Route::any('/eliminarEmpleado/{id}', 'UserController@destroy')->name('eliminarEmpleado')->middleware('auth.admin');
Route::ANY('/ModificarEmpleado', 'UserController@PruebAupdate')->name('ModificarEmpleado')->middleware('auth.admin');


// Route::get('/empleados', 'EmpleadoController@index')->name('indexEmpleado');



//-----PRODUCTOS---/
Route::resource('Productos', ProductoController::class)->middleware('auth.admin');
Route::any('/ProductosEliminar/{id}', 'ProductoController@destroy')->name('eliminarProducto')->middleware('auth.admin');
Route::ANY('/ModificarProducto', 'ProductoController@update')->name('modificarProducto')->middleware('auth.admin');



//-----FACTURAS---/
Route::resource('Facturas', FacturaController::class)->middleware('auth.admin');
Route::get('/FacturasEliminar/{id}', 'FacturaController@destroy')->name('eliminarFactura')->middleware('auth.admin');
Route::get('/FacturasPdf/{id}', 'FacturaController@Generar_pdf')->name('Facturas.pdf')->middleware('auth.admin');
Route::any('/eliminarFactura/{id}', 'FacturaController@destroy')->name('eliminarFactura')->middleware('auth.admin');
Route::any('/pagadaFactura/{id}', 'FacturaController@pagadaFactura')->name('pagadaFactura')->middleware('auth.admin');
