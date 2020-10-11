<?php

use Illuminate\Support\Facades\Route;

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

//Rutas de vehiculos

Route::get('/vehiculos','VehiculoController@index')->name('vehiculos.index');
Route::get('/vehiculos/create','VehiculoController@create')->name('vehiculos.create');
Route::post('/vehiculos/store', 'VehiculoController@store')->name('vehiculos.store');
Route::delete('/vehiculos/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy');
Route::get('/vehiculos/{vehiculo}/edit', 'VehiculoController@edit')->name('vehiculos.edit');
Route::put('/vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update');
Route::get('/vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ruta del index del cliente
Route::get('/clientes','ClienteController@index')->name('clientes.index');


//ruta del formulario de creacion del cliente
Route::get('/clientes/create','ClienteController@create')->name('clientes.create');

//ruta post para guardar un nuevo del cliente
Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');

//ruta delete para eliminar un cliente
Route::delete('/clientes/{cliente}','ClienteController@destroy')->name('clientes.destroy');

//ruta del formulario para ver  del cliente
Route::get('/clientes/{cliente}','ClienteController@show')->name('clientes.show');

//ruta del formulario para editar cliente
Route::get('/clientes/{cliente}/edit','ClienteController@edit')->name('clientes.edit');

//ruta delete para actulizar un cliente
Route::put('/clientes/{cliente}','ClienteController@update')->name('clientes.update');




