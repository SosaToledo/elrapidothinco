<?php

namespace App\Http\Controllers;

use App\Viaje;
use App\Comprobante;
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
                ->select('viajes.id','viajes.idSimpleViaje','viajes.fecha','clientes.nombre','camioneros.apellido','camioneros.nombre as nombreCamionero','camiones.id_simple_camiones', 'viajes.estados')
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
        $ultimo = FuncionesComunes::rellenarNum('viajes');
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
        $viaje = new Viaje;
        $viaje->idSimpleViaje = $request->idSimpleViajes;
        $viaje->id_camiones = $request->camion;
        $viaje->id_acoplado = $request->acoplado;
        $viaje->id_camionero = $request->camionero;
        $viaje->id_cliente = $request->cliente;
        $viaje->km_inicial = $request->km_inicial ?? 0;
        $viaje->km_final = $request->km_final ?? 0;
        $viaje->distancia = $request->distancia ?? 0;
        $viaje->origen = $request->origen;
        $viaje->destino = $request->destino;
        $viaje->remitos = $request->remitos ?? 0;
        $viaje->carta_porte = $request->carta_porte ?? 0;
        $viaje->cantidad = $request->cantidad ?? 0;
        $viaje->precio = $request->precio ?? 0;
        $viaje->valor = $request->valor ?? 0;
        $viaje->ganancia_camionero = $request->ganancia_camionero ?? 0;
        $viaje->tipoCamion = $request->tipoCamion;
        $viaje->fecha = $request->fecha;
        $viaje->peajes = $request->peaje ?? 0;
        $viaje->gasoil_litros = $request->gasoil_litros ?? 0 ;
        $viaje->gasoil_precio = $request->gasoil_precio ?? 0;
        $viaje->notaViaje = $request->notaViaje ?? 0;
        $viaje->guia = $request->guia ?? 0;
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
        $viaje = Viaje::select('viajes.id','viajes.idSimpleViaje','viajes.id_camiones','viajes.id_acoplado','viajes.id_camionero',
                                'viajes.id_cliente','viajes.km_inicial','viajes.km_final',
                                'viajes.distancia','viajes.origen','viajes.valor',
                                'viajes.cantidad', 'viajes.precio', 'viajes.remitos',
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

                            //Codigo, camionero, tipo, monto
        $comprobantes = Comprobante::select('comprobantes.id','comprobantes.id_simple_comprobante',
                            'comprobantes.id_camioneros','comprobantes.tipo','comprobantes.monto',
                            'camioneros.apellido','camioneros.nombre')
                            ->join('camioneros','comprobantes.id_camioneros','camioneros.id')
                            ->where('comprobantes.id_viaje','=',$viaje[0]->id)
                            ->get();
        
                            //dd($comprobantes);
        return view('Viajes.edit')->with(compact('viaje'))->with(compact('comprobantes'));
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
       
        $viaje = Viaje::find($id);
        $viaje->id_camiones = $request->camion;
        $viaje->id_acoplado = $request->acoplado;
        $viaje->id_camionero = $request->camionero;
        $viaje->id_cliente = $request->cliente;
        $viaje->km_inicial = $request->km_inicial ?? 0;
        $viaje->km_final = $request->km_final ?? 0;
        $viaje->distancia = $request->distancia ?? 0;
        $viaje->origen = $request->origen;
        $viaje->destino = $request->destino;
        $viaje->remitos = $request->remitos ?? 0;
        $viaje->carta_porte = $request->carta_porte ?? 0;
        $viaje->cantidad = $request->cantidad ?? 0;
        $viaje->precio = $request->precio ?? 0;
        $viaje->valor = $request->valor;
        $viaje->ganancia_camionero = $request->ganancia_camionero ?? 0;
        $viaje->tipoCamion = $request->tipoCamion;
        $viaje->fecha = $request->fecha;
        $viaje->peajes = $request->peajes ?? 0;
        $viaje->gasoil_litros = $request->gasoil_litros ?? 0;
        $viaje->gasoil_precio = $request->gasoil_precio ?? 0;
        $viaje->notaViaje = $request->notaViaje ?? 0;
        $viaje->guia = $request->guia ?? 0;
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