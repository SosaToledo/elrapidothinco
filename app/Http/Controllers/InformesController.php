<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Viaje;
use Illuminate\Support\Facades\DB;

class InformesController extends Controller
{
    public function ventas() {

        /* $detallesFacturacion = DB::select("1"); */

        /* dd($detallesFacturacion); */

        return view('Informes.ventas');
    }
}
