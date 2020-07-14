<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
  
        return view('clientes.index',compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'cuil' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $id=DB::select("SHOW TABLE STATUS LIKE 'clientes'");
        $next_id=$id[0]->Auto_increment;

        $cliente = new Cliente;
        $cliente->id_simple_clientes = $next_id;
        $cliente->cuil = $request->cuil;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->created_at = Carbon::now();
        $cliente->updated_at = Carbon::now();
        $cliente->save(['timestamps' => false]);

        return redirect()->route('clientes.index')
                        ->with('success','Cliente ingresado correctamente.');
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
        $cliente = Cliente::find($id);
        return view('clientes.edit',compact('cliente'));
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
            'cuil' => 'required',
            'nombre' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);

        $cliente = Cliente::find($id);
        $cliente->cuil = $request->cuil;
        $cliente->nombre = $request->nombre;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->save();

        return redirect()->route('clientes.index')
                        ->with('success','Cliente actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        try {
            $cliente->delete();
        } catch (\Throwable $th) {
            return redirect()->route('clientes.index')
                        ->with('success','El cliente no fue eliminado por tener viajes asignados');
        }

        
        return redirect()->route('clientes.index')
                        ->with('success','Cliente eliminado');
    }

    public function searchClientes(Request $request){

        $search = $request->get('term');
        //$search = $request->search;

        if($search == ''){
            $clientes = Cliente::orderby('nombre','asc')->select('id','nombre')->limit(5)->get();
         }else{
            $clientes = Cliente::orderby('nombre','asc')->select('id','nombre')->where('nombre', 'like', '%' .$search . '%')->limit(5)->get();
         }
   
         $response = array();
         foreach($clientes as $Cliente){
            $response[] = array("nombre"=>$Cliente->nombre, "id"=>$Cliente->id);
         }
         return response()->json($response);

    }

}
