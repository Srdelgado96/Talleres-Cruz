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
Route::get('/home', 'ClienteController@index')->name('home');


//-----VEHICULOS---/
Route::resource('Vehiculos', ClienteController::class);
Route::get('/vehiculos', 'VehiculoController@index')->name('indexVehiculo');


//-----AVERIAS---/
Route::resource('Averias', AveriaController::class);

Route::get('/AveriasEliminar/{id}', 'AveriaController@Destroy')->name('eliminarAveria');

//-----EMPLEADO---/
Route::resource('Empleados', UserController::class);
Route::get('/EmpleadosEliminar/{id}', 'EmpleadoController@destroy')->name('eliminarEmpleado');
// Route::get('/empleados', 'EmpleadoController@index')->name('indexEmpleado');



//-----PRODUCTOS---/
Route::resource('Productos', ProductoController::class);
Route::get('/ProductosEliminar/{id}', 'ProductoController@destroy')->name('eliminarProducto');



//-----FACTURAS---/
Route::resource('Facturas', FacturaController::class);
Route::get('/FacturasEliminar/{id}', 'FacturaController@destroy')->name('eliminarFactura');
Route::get('/FacturasPdf/{id}', 'FacturaController@pdf')->name('Facturas.pdf');



