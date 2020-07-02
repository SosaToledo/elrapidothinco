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


