<?php

namespace App\Http\Controllers;

use App\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::orderby('fecha','asc')
                ->select('Viajes.id','Viajes.idSimpleViaje','Viajes.fecha','clientes.nombre','camioneros.apellido','camiones.id_simple_camiones', 'Viajes.estados')
                ->join('clientes','Viajes.id_cliente','=','clientes.id')
                ->join('camioneros','Viajes.id_camionero','=','camioneros.id')
                ->join('camiones','Viajes.id_camiones','=','camiones.id')
                ->get();

        return view('Viajes.index',compact('viajes'));

        // este anda 
/*         $viajes = Viaje::latest()->paginate(10);
        return view('Viajes.index',compact('viajes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimo = DB::table('viajes')->orderByDesc('created_at')->first();
        if($ultimo == null)
            $ultimo = FuncionesComunes::rellenarNum(1);
        else
            $ultimo = FuncionesComunes::rellenarNum($ultimo->id + 1);
        return view('Viajes.create', compact('ultimo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'camion' => 'required',
            'camionero' => 'required',
            'cliente' => 'required',
            'km_inicial' => 'required',
            'km_final' => 'required',
            'distancia' => 'required',
            'origen' => 'required',
            'destino' => 'required',
            'valor' => 'required',
            'ganancia_camionero' => 'required',
            'tipoCamion' => 'required',
            'fecha' => 'required',
            'peajes' => 'required',
            'gasoil_litros' => 'required',
            'gasoil_precio' => 'required',
            'notaViaje' => 'required',
            'guia' => 'required',
            'estado' => 'required'
        ]);

        
        $viaje = new Viaje;
        $viaje->idSimpleViaje = $request->idSimpleViajes;
        $viaje->id_camiones = $request->camion;
        $viaje->id_acoplado = $request->acoplado;
        $viaje->id_camionero = $request->camionero;
        $viaje->id_cliente = $request->cliente;
        $viaje->km_inicial = $request->km_inicial;
        $viaje->km_final = $request->km_final;
        $viaje->distancia = $request->distancia;
        $viaje->origen = $request->origen;
        $viaje->destino = $request->destino;
        $viaje->valor = $request->valor;
        $viaje->ganancia_camionero = $request->ganancia_camionero;
        $viaje->tipoCamion = $request->tipoCamion;
        $viaje->fecha = $request->fecha;
        $viaje->peajes = $request->peajes;
        $viaje->gasoil_litros = $request->gasoil_litros;
        $viaje->gasoil_precio = $request->gasoil_precio;
        $viaje->notaViaje = $request->notaViaje;
        $viaje->guia = $request->guia;
        $viaje->estados = $request->estado;
        $viaje->created_at = Carbon::now();
        $viaje->updated_at = Carbon::now();
        $viaje->save(['timestamps' => false]);
        
        // $viaje_ultimo = DB::table('viajes')->orderByDesc('created_at')->first();
        
        // DB::table('ciudades_viajes')->insert([
        //     'id_ciudad' => $request->destino,
        //     'id_viajes' => $viaje_ultimo->id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        
        $viaje->save(['timestamps' => false]);

        return redirect()->route('Viajes.index')
                        ->with('success','viaje ingresado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viaje = Viaje::find($id);
        return view('Viajes.show',compact('viaje'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //TODO Falta agregar los destinos a este select
        $viaje = Viaje::select('Viajes.id','Viajes.id_camiones','Viajes.id_acoplado','Viajes.id_camionero',
                                'Viajes.id_cliente','Viajes.km_inicial','Viajes.km_final',
                                'Viajes.distancia','Viajes.origen','Viajes.valor',
                                'Viajes.ganancia_camionero','Viajes.tipoCamion','Viajes.fecha',
                                'Viajes.peajes','Viajes.gasoil_litros','Viajes.gasoil_precio',
                                'Viajes.notaViaje','Viajes.guia', 'Viajes.destino',
                                'acoplado.id_simple_acoplado','camiones.id_simple_camiones',
                                'camioneros.apellido','camioneros.nombre','clientes.nombre as clienteNombre', 
                                'Viajes.estados')
                        ->join('camioneros','Viajes.id_camionero','camioneros.id')
                        ->leftJoin('acoplado','Viajes.id_acoplado','acoplado.id')
                        ->join('camiones','Viajes.id_camiones','camiones.id')
                        ->join('clientes','Viajes.id_cliente','clientes.id')
                        ->where('Viajes.id','=',$id)
                        ->get();

        
        return view('Viajes.edit',compact('viaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'camion' => 'required',
            'camionero' => 'required',
            'cliente' => 'required',
            'km_inicial' => 'required',
            'km_final' => 'required',
            'distancia' => 'required',
            'origen' => 'required',
            'destino' => 'required',
            'valor' => 'required',
            'ganancia_camionero' => 'required',
            'tipoCamion' => 'required',
            'fecha' => 'required',
            'peajes' => 'required',
            'gasoil_litros' => 'required',
            'gasoil_precio' => 'required',
            'notaViaje' => 'required',
            'guia' => 'required',
            'estado' => 'required'
        ]);

        $viaje = Viaje::find($id);
        $viaje->id_camiones = $request->camion;
        $viaje->id_acoplado = $request->acoplado;
        $viaje->id_camionero = $request->camionero;
        $viaje->id_cliente = $request->cliente;
        $viaje->km_inicial = $request->km_inicial;
        $viaje->km_final = $request->km_final;
        $viaje->distancia = $request->distancia;
        $viaje->origen = $request->origen;
        $viaje->destino = $request->destino;
        $viaje->valor = $request->valor;
        $viaje->ganancia_camionero = $request->ganancia_camionero;
        $viaje->tipoCamion = $request->tipoCamion;
        $viaje->fecha = $request->fecha;
        $viaje->peajes = $request->peajes;
        $viaje->gasoil_litros = $request->gasoil_litros;
        $viaje->gasoil_precio = $request->gasoil_precio;
        $viaje->notaViaje = $request->notaViaje;
        $viaje->guia = $request->guia;
        $viaje->estados = $request->estado;
        $viaje->save();

       

        return redirect()->route('Viajes.index')
                        ->with('success','viaje actulizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viaje = Viaje::find($id);
        $viaje->delete();
        
        return redirect()->route('Viajes.index')
                        ->with('success','Viaje eliminado');
    }

    public function searchViajes(Request $request){

        $search = $request->get('term');
        //$search = $request->search;
        
        if($search == ''){
            $viajes = Viaje::orderby('idSimpleViaje','asc')->select('id','idSimpleViaje')->limit(5)->get();
         }else{
            $viajes = Viaje::orderby('idSimpleViaje','asc')->select('id','idSimpleViaje')->where('idSimpleViaje', 'like', '%' .$search . '%')->limit(5)->get();
         }
   
         $response = array();
         foreach($viajes as $viaje){
            $response[] = array("idSimpleviaje"=>$viaje->idSimpleViaje,"id"=>$viaje->id);
         }
         return response()->json($response);

    }

}