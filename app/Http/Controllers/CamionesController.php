<?php

namespace App\Http\Controllers;

use App\Camion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;


class CamionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camiones = Camion::latest()->paginate(10);
  
        return view('Camiones.index',compact('camiones'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id = DB::select("SHOW TABLE STATUS LIKE 'camiones'");
        // $ultimo = $id[0]->Auto_increment;
        
        // ->orderByDesc('created_at')->first();
        // if($ultimo == null){
        //     $ultimo = FuncionesComunes::rellenarNum(1);
        //     return view('Camiones.create', compact('ultimo'));
        // }
        // $ultimo = FuncionesComunes::rellenarNum($ultimo->id + 1);

        $ultimo = FuncionesComunes::rellenarNum('camiones');
        return view('Camiones.create', compact('ultimo'));
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
            'patente' => 'required',
            'idSimple' => 'required',
            'vtv_vencimiento' => 'required',
            'senasa_vencimiento' => 'required',
            'seguro_vencimiento' => 'required',
        ]);
  
        $camion = new Camion;
        $camion->id_simple_camiones = $request->idSimple;
        $camion->patente = $request->patente;
        $camion->vtv_vencimiento = $request->vtv_vencimiento;
        $camion->senasa_vencimiento = $request->senasa_vencimiento;
        $camion->seguro_vencimiento = $request->seguro_vencimiento;
        $camion->created_at = Carbon::now();
        $camion->updated_at = Carbon::now();
        $camion->save(['timestamps' => false]);

        return redirect()->route('camiones.index')
                        ->with('success','Camión ingresado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camion = Camion::find($id);
        return view('Camiones.edit',compact('camion'));
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
        
        //echo (dd($camion));
        $request->validate([
            'patente' => 'required',
            'vtv_vencimiento' => 'required',
            'senasa_vencimiento' => 'required',
            'seguro_vencimiento' => 'required',
            ]);
        
        
        $camion = Camion::find($id);
        $camion->patente = $request->get('patente');
        $camion->vtv_vencimiento = $request->get('vtv_vencimiento');
        $camion->senasa_vencimiento = $request->get('senasa_vencimiento');
        $camion->seguro_vencimiento = $request->get('seguro_vencimiento');
        $camion->save();
            
        return redirect()->route('camiones.index')
                        ->with('success','Camión actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camion = Camion::find($id);
     
        try {
            $camion->delete();
        } catch (\Throwable $thh) {
            return redirect()->route('camiones.index')
                        ->with('success','El camión no fue eliminado por tener viajes realizados');
        }
     
        return redirect()->route('camiones.index')
                        ->with('success','Camión eliminado');
            
    }


    public function searchCamiones(Request $request){

        $search = $request->get('term');

        if($search == ''){
            $camiones = Camion::orderby('patente','asc')->select('id','patente')->limit(5)->get();
         }else{
            $camiones = Camion::orderby('patente','asc')->select('id','patente')->where('patente', 'like', '%' .$search . '%')->limit(5)->get();
         }
   
         $response = array();
         foreach($camiones as $camion){
            $response[] = array("patente"=>$camion->patente,"id"=>$camion->id);
         }
         return response()->json($response);

    }
}
