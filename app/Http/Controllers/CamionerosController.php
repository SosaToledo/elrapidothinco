<?php

namespace App\Http\Controllers;

use App\Camionero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class camionerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camioneros = Camionero::latest()->paginate(10);

        return view('Camioneros.index',compact('camioneros'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimo = FuncionesComunes::rellenarNum('camioneros');
        return view('Camioneros.create', compact('ultimo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $camionero = new Camionero;
        
        $camionero->telefono = $request->telefono;
        /* $camionero->id_simple_camioneros = $request->id_simple; */
        $camionero->id_simple_camioneros = 'CM'.FuncionesComunes::rellenarNum('camioneros');
        $camionero->nombre = $request->nombre;
        $camionero->apellido = $request->apellido;
        $camionero->direccion = $request->direccion;
        $camionero->dni = $request->dni;
        $camionero->cbu = $request->cbu;
        $camionero->fecha_alta_temprana = $request->fecha_alta_temprana;
        $camionero->created_at = Carbon::now();
        $camionero->updated_at = Carbon::now();
        $camionero->save(['timestamps' => false]);

        return redirect()->route('camioneros.index')
                        ->with('success','Camionero ingresado correctamente.');
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
        $camionero = Camionero::find($id);
        return view('Camioneros.edit',compact('camionero'));
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
        $camionero = Camionero::find($id);
        $camionero->telefono = $request->telefono;
        $camionero->nombre = $request->nombre;
        $camionero->apellido = $request->apellido;
        $camionero->direccion = $request->direccion;
        $camionero->dni = $request->dni;
        $camionero->cbu = $request->cbu;
        $camionero->fecha_alta_temprana = $request->fecha_alta_temprana;
        $camionero->save();

        return redirect()->route('camioneros.index')
                        ->with('success','Camionero actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camionero = Camionero::find($id);
         
        try {
            $camionero->delete(); 
        } catch (\Throwable $th) {
            return redirect()->route('camioneros.index')
                        ->with('error','El camionero no fue eliminado por tener viajes/comprobantes');
        }
        
        return redirect()->route('camioneros.index')
                        ->with('success','El camionero fue eliminado');
    }

    public function searchCamioneros(Request $request){

        $search = $request->get('term');
        //$search = $request->search;

        if($search == ''){
            $camioneros = Camionero::orderby('apellido','asc')->select('id','apellido','nombre')->limit(5)->get();
         }else{
            $camioneros = Camionero::orderby('apellido','asc')->select('id','apellido','nombre')->where('apellido', 'like', '%' .$search . '%')->limit(5)->get();
         }
   
         $response = array();
         foreach($camioneros as $camionero){
            $response[] = array("apellido"=>$camionero->apellido,"nombre"=>$camionero->nombre, "id"=>$camionero->id);
         }
         return response()->json($response);

    }

}
