<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadesController extends Controller
{
    public function searchCiudades(Request $request){

        $search = $request->get('term');
        //$search = $request->search;

        if($search == ''){
            $ciudades = Ciudad::orderby('ciudad_nombre','asc')
                        ->select('ciudades.id','ciudades.ciudad_nombre','provincias.provincia_nombre')
                        ->join('provincias','ciudades.provincia_id','=','provincias.id')
                        ->limit(5)
                        ->get();
         }else{
            $ciudades = Ciudad::orderby('ciudad_nombre','asc')
                        ->select('ciudades.id','ciudades.ciudad_nombre','provincias.provincia_nombre')
                        ->join('provincias','ciudades.provincia_id','=','provincias.id')
                        ->where('ciudades.ciudad_nombre', 'like', '%' .$search . '%')
                        ->limit(5)
                        ->get();
         }
   
         $response = array();
         foreach($ciudades as $ciudad){
            $response[] = array("nombre"=>$ciudad->ciudad_nombre,'provincia'=>$ciudad->provincia_nombre, "id"=>$ciudad->id);
         }
         return response()->json($response);

    }
}
