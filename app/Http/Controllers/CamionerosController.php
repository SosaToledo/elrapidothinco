<?php

namespace App\Http\Controllers;

use App\Camionero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class CamionerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camioneros = Camionero::latest()->paginate(10);

        return view('camioneros.index',compact('camioneros'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('camioneros.create');
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
            'dni' => 'required',
            'telefono' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
        ]);

        $id=DB::select("SHOW TABLE STATUS LIKE 'camioneros'");
        $next_id=$id[0]->Auto_increment;
        
        $camionero = new Camionero;
        $camionero->id_simple_camioneros = $next_id;
        $camionero->telefono = $request->telefono;
        $camionero->nombre = $request->nombre;
        $camionero->apellido = $request->apellido;
        $camionero->direccion = $request->direccion;
        $camionero->dni = $request->dni;
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
        return view('camioneros.edit',compact('camionero'));
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
            'dni' => 'required',
            'telefono' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
        ]);
        
        $camionero = Camionero::find($id);
        $camionero->telefono = $request->telefono;
        $camionero->nombre = $request->nombre;
        $camionero->apellido = $request->apellido;
        $camionero->direccion = $request->direccion;
        $camionero->dni = $request->dni;
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
        $camionero->delete();
        return redirect()->route('camioneros.index')
                        ->with('success','Camionero eliminado');
    }
}
