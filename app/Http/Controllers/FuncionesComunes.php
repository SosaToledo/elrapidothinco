<?php

namespace App\Http\Controllers;

class FuncionesComunes
{

    /* Función para completar el numero dado para que quede en formato XXX. Si se entrega 1 devuelve 001, 25 entrega 025 */
    
    public static function rellenarNum($numero){
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