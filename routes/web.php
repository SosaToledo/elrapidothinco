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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('acoplados','AcopladoController')->middleware('role:admin');
Route::resource('camiones','CamionesController')->middleware('role:admin');
Route::resource('camioneros','CamionerosController')->middleware('role:admin');

Route::resource('comprobantes','ComprobantesController')->middleware('role:admin');
Route::get('/comprobantes/{camionero}/{viaje}', 'ComprobantesController@create')->name('createWithData');

Route::resource('payments', 'PaymentsController', ['except' => 'create']);
Route::resource('clientes','ClientesController')->middleware('role:admin');
Route::resource('viajes','ViajesController')->middleware('role:admin');
Route::resource('sueldos','SueldosController')->middleware('role:admin');

Route::get('ventas', 'InformesController@ventas')->name('informes.ventas');
Route::resource('informes', 'InformesController');

Route::get('camionesAutocomplete','CamionesController@searchCamiones')->name('camiones.search');
Route::get('acopladoAutocomplete','AcopladoController@searchAcoplado')->name('acoplado.search');
Route::get('camionerosAutocomplete','CamionerosController@searchCamioneros')->name('camioneros.search');
Route::get('clienteAutocomplete','ClientesController@searchClientes')->name('clientes.search');
Route::get('ciudadAutocomplete','CiudadesController@searchCiudades')->name('ciudades.search');
Route::get('viajesAutocomplete','ViajesController@searchViajes')->name('viajes.search');