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

Route::get('/', 'indexController@index')->name('index');
Auth::routes();
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
Route::any('/eliminarAveria/{id}', 'AveriaController@Destroy')->name('eliminarAveria')->middleware('auth.admin')->middleware('auth.admin');
Route::any('/listarVehiculos/{id}', 'AveriaController@listarVehiculos')->name('listarVehiculos')->middleware('auth.admin');
Route::any('/listarVehiculosParaModificarAveria/{id}', 'AveriaController@listarVehiculosParaModificarAveria')->name('listarVehiculosModificarAveria')->middleware('auth.admin');
Route::any('/listarAveriasNuevaFactura/{id}', 'FacturaController@listarAveriasParaNuevaFactura')->name('listarAveriasParaNuevaFactura')->middleware('auth.admin');



//-----EMPLEADO---/
Route::resource('Empleados', UserController::class)->middleware('auth.admin');;
Route::any('/EmpleadosEliminar/{id}', 'EmpleadoController@destroy')->name('eliminarEmpleado')->middleware('auth.admin');
// Route::get('/empleados', 'EmpleadoController@index')->name('indexEmpleado');



//-----PRODUCTOS---/
Route::resource('Productos', ProductoController::class)->middleware('auth.admin');
Route::any('/ProductosEliminar/{id}', 'ProductoController@destroy')->name('eliminarProducto')->middleware('auth.admin');
Route::ANY('/ModificarProducto', 'ProductoController@update')->name('modificarProducto')->middleware('auth.admin');



//-----FACTURAS---/
Route::resource('Facturas', FacturaController::class)->middleware('auth.admin');
Route::get('/FacturasEliminar/{id}', 'FacturaController@destroy')->name('eliminarFactura')->middleware('auth.admin');
Route::get('/FacturasPdf/{id}', 'FacturaController@Generar_pdf')->name('Facturas.pdf')->middleware('auth.admin');
