<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/newTravel', 'travelController@index')->name('travel');

Route::resource('acoplados','AcopladoController')->middleware('role:admin');
Route::resource('camiones','CamionesController')->middleware('role:admin');
Route::resource('camioneros','CamionerosController')->middleware('role:admin');
Route::resource('comprobantes','ComprobantesController')->middleware('role:admin');
Route::resource('clientes','ClientesController')->middleware('role:admin');
Route::resource('viajes','ViajesController')->middleware('role:admin');
Route::resource('sueldos','SueldosController')->middleware('role:admin');

//ruta para la consulta ajax que devuelve todo 
//TODO falta middleware?
Route::get('camionesAutocomplete','CamionesController@searchCamiones')->name('camiones.search');
Route::get('acopladoAutocomplete','AcopladoController@searchAcoplado')->name('acoplado.search');
Route::get('camionerosAutocomplete','CamionerosController@searchCamioneros')->name('camioneros.search');
Route::get('clienteAutocomplete','ClientesController@searchClientes')->name('clientes.search');
Route::get('ciudadAutocomplete','CiudadesController@searchCiudades')->name('ciudades.search');
Route::get('viajesAutocomplete','ViajesController@searchViajes')->name('viajes.search');


