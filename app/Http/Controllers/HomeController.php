<?php

namespace App\Http\Controllers;

use App\viaje;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $viajes = Viaje::orderby('id','asc')
                ->select('viajes.id','viajes.idSimpleViaje','viajes.fecha','clientes.nombre','camioneros.apellido','camiones.id_simple_camiones', 'viajes.estados')
                ->join('clientes','viajes.id_cliente','=','clientes.id')
                ->join('camioneros','viajes.id_camionero','=','camioneros.id')
                ->join('camiones','viajes.id_camiones','=','camiones.id')
                ->where('viajes.estados', 'Iniciado')
                ->get();

        $request -> user()->authorizeRoles(['user','admin']);
        return view('home')->with(compact('viajes'));
    }

    /*
    Dejo funcion de ejemplo de como direccionar a otro sitio cuando el usuario logeado es de tipo admin.
    public function someAdminStuff (Request $request){
        $request->user()->authorizeRoles('admin');
        return view ('some.view');
    } 
    */
}
