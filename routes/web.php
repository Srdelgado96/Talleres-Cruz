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
Route::post('infoclientes', 'ClienteController@infoclientes')->name('infoclientes');
Route::get('/clientes', 'ClienteController@index')->name('indexCliente');

//-----VEHICULOS---/
Route::resource('Vehiculos', ClienteController::class);
Route::get('/vehiculos', 'VehiculoController@index')->name('indexVehiculo');


//-----AVERIAS---/
Route::resource('Averias', ClienteController::class);
Route::get('/averias', 'AveriaController@index')->name('indexAverias');



