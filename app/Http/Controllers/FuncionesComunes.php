<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FuncionesComunes
{

    /* Función para completar el numero dado para que quede en formato XXX. Si se entrega 1 devuelve 001, 25 entrega 025 */
    
    // public static function rellenarNum($numero){
    //     if ($numero < 100) {
    //         if ($numero < 10) {
    //             return "00".$numero;
    //         }else{
    //             return "0".$numero;
    //         }
    //     }      
    // }

    public static function rellenarNum($tabla){

        $id = DB::select("SHOW TABLE STATUS LIKE '".$tabla."'");
        $numero = $id[0]->Auto_increment;
        if ($numero < 100) {
            if ($numero < 10) {
                return "00".$numero;
            }else{
                return "0".$numero;
            }
        }      
    }
}

?>