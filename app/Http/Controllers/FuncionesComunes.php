<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FuncionesComunes
{

    public static function rellenarNum($tabla){

        $id = DB::select("SHOW TABLE STATUS LIKE '".$tabla."'");
        $numero = $id[0]->Auto_increment;
        if ($numero < 100) {
            if ($numero < 10) {
                return "00".$numero;
            }else{
                return "0".$numero;
            }
        } else{
            return $numero;
        }      
    }
}

?>