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
Route::resource('Clientes', ClienteController::class);
Route::any('/eliminarCliente/{id}', 'ClienteController@Destroy')->name('eliminarCliente');//se llama por ajax y se le pasa id
Route::any('/ModificarCliente', 'ClienteController@update')->name('ModificarCliente'); //se llama por ajax y se le pasa id



//-----VEHICULOS---/
Route::resource('Vehiculos', VehiculoController::class);
Route::ANY('/ModificarVehiculo', 'VehiculoController@update')->name('modificarVehiculo');//se llama por ajax y se le pasa id
Route::any('/eliminarVehiculo/{id}', 'VehiculoController@Destroy')->name('eliminarVehiculo');//se llama por ajax y se le pasa id


//-----AVERIAS---/
Route::get('/home', 'AveriaController@index')->name('home');
Route::ANY('/ModificarAveria', 'AveriaController@PruebAupdate')->name('modificarAveria');
Route::resource('Averias', AveriaController::class);
Route::any('/eliminarAveria/{id}', 'AveriaController@Destroy')->name('eliminarAveria');
Route::any('/listarVehiculos/{id}', 'AveriaController@listarVehiculos')->name('listarVehiculos');
Route::any('/listarVehiculosParaModificarAveria/{id}', 'AveriaController@listarVehiculosParaModificarAveria')->name('listarVehiculosModificarAveria');


//-----EMPLEADO---/
Route::resource('Empleados', UserController::class);
Route::any('/EmpleadosEliminar/{id}', 'EmpleadoController@destroy')->name('eliminarEmpleado');
// Route::get('/empleados', 'EmpleadoController@index')->name('indexEmpleado');



//-----PRODUCTOS---/
Route::resource('Productos', ProductoController::class);
Route::any('/ProductosEliminar/{id}', 'ProductoController@destroy')->name('eliminarProducto');
Route::ANY('/ModificarProducto', 'ProductoController@update')->name('modificarProducto');



//-----FACTURAS---/
Route::resource('Facturas', FacturaController::class);
Route::get('/FacturasEliminar/{id}', 'FacturaController@destroy')->name('eliminarFactura');
Route::get('/FacturasPdf/{id}', 'FacturaController@pdf')->name('Facturas.pdf');



