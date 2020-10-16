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

        /* Aca traemos todos los viajes del año Seleccionado, ahora solo trae el actual */
        $detallesFacturacion = DB::select("select id,id_camiones,valor,fecha from viajes where year(fecha) = year(current_date())");

        $filasCamiones = DB::select("select id_camiones,id_simple_camiones from viajes inner join camiones on (id_camiones=camiones.id) where year(fecha) = year(current_date()) GROUP by id_camiones,id_simple_camiones");

        /* Aca tenemos la cantidad de columnas de la matriz */
        $cantidadDeCamiones = count($filasCamiones);

        /* dd($cantidadDeCamiones); */
        /* dd($detallesFacturacion); */

        $columnas = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','Total'];
        $filas=array();

        /*          ENERO   FEBRERO MARZO   ABRIL ...   DICIEMBRE    */
        /* CM001    12      23      45      56    ...   78           */
        /* CM002    12      23      45      56    ...   78           */
        /* CM003    12      23      45      56    ...   78           */
        /* ...  */
        /* CM015    12      23      45      56    ...   78           */

        /* Aca generamos toda la matriz que vamos a usar */
        
        foreach ($filasCamiones as $filasCam) {
            $filas[$filasCam->id_simple_camiones]=array(
                "January"=>0,
                "February"=>0,
                "March"=>0,
                "April"=>0,
                "May"=>0,
                "June"=>0,
                "July"=>0,
                "August"=>0,
                "September"=>0,
                "October"=>0,
                "November"=>0,
                "December"=>0,
                "total"=>0
            );
        }

        foreach ($detallesFacturacion as $fact) {
            $this->agregarAMatriz($filas,$fact->id_camiones,$fact->valor,date('F',strtotime($fact->fecha)));
        }

        return view('Informes.ventas')
        ->with((compact('filas')))
        ->with((compact('columnas')));

    }
    public function agregarAMatriz(&$array, $key, $value, $month){

        $keyBuscada = "CA".FuncionesComunes::pasarIdACodSimple($key);
            
        $array["CA".FuncionesComunes::pasarIdACodSimple($key)][$month]+=$value;
        $array["CA".FuncionesComunes::pasarIdACodSimple($key)]['total']+=$value;
        
    }

}
