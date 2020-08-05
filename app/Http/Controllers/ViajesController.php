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
                ->select('viajes.id','viajes.idSimpleViaje','viajes.fecha','clientes.nombre','camioneros.apellido','camiones.id_simple_camiones', 'viajes.estados')
                ->join('clientes','viajes.id_cliente','=','clientes.id')
                ->join('camioneros','viajes.id_camionero','=','camioneros.id')
                ->join('camiones','viajes.id_camiones','=','camiones.id')
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

        return redirect()->route('viajes.index')
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
        $viaje = Viaje::select('viajes.id','viajes.id_camiones','viajes.id_acoplado','viajes.id_camionero',
                                'viajes.id_cliente','viajes.km_inicial','viajes.km_final',
                                'viajes.distancia','viajes.origen','viajes.valor',
                                'viajes.ganancia_camionero','viajes.tipoCamion','viajes.fecha',
                                'viajes.peajes','viajes.gasoil_litros','viajes.gasoil_precio',
                                'viajes.notaViaje','viajes.guia', 'viajes.destino',
                                'acoplado.id_simple_acoplado','camiones.id_simple_camiones',
                                'camioneros.apellido','camioneros.nombre','clientes.nombre as clienteNombre', 
                                'viajes.estados')
                        ->join('camioneros','viajes.id_camionero','camioneros.id')
                        ->leftJoin('acoplado','viajes.id_acoplado','acoplado.id')
                        ->join('camiones','viajes.id_camiones','camiones.id')
                        ->join('clientes','viajes.id_cliente','clientes.id')
                        ->where('viajes.id','=',$id)
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

       

        return redirect()->route('viajes.index')
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
        
        return redirect()->route('viajes.index')
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