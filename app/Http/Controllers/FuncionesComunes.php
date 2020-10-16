<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FuncionesComunes
{
    /* 
    00000   Ultimo else
    X0000   hasta x9999
    XX000   hasta xx999
    XXX00   hasta xxx99
    XXXX0   hasta xxxx9
     */
    public static function rellenarNum($tabla){
        $id = DB::select("SHOW TABLE STATUS LIKE '".$tabla."'");
        $numero = $id[0]->Auto_increment;
        if ($numero < 10000){
            if($numero < 1000){
                if ($numero < 100){
                    if ($numero < 10) {
                        return "0000".$numero;
                    }else{
                        return "000".$numero;
                    }
                }else{
                    return "00".$numero;
                }
            }else{
                return "0".$numero;
            }
        }else{
            return $numero;
        }
    }
    
    public static function pasarIdACodSimple($id){
        $numero = $id;
        if ($numero < 10000){
            if($numero < 1000){
                if ($numero < 100){
                    if ($numero < 10) {
                        return "0000".$numero;
                    }else{
                        return "000".$numero;
                    }
                }else{
                    return "00".$numero;
                }
            }else{
                return "0".$numero;
            }
        }else{
            return $numero;
        }
    }
}

?>