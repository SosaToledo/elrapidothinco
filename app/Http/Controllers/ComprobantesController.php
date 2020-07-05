<?php

namespace App\Http\Controllers;

use App\Comprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;

class ComprobantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantes = Comprobante::latest()->paginate(10);
  
        return view('comprobantes.index',compact('comprobantes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comprobantes.create');
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
            'fecha' => 'required',
            'camionero' => 'required',
            'detalles' => 'required',
            'tipo' => 'required',
            'monto' => 'required',
        ]);

        $id=DB::select("SHOW TABLE STATUS LIKE 'comprobantes'");
        $next_id=$id[0]->Auto_increment;

        $comprobante = new Comprobante;
        $comprobante->id_simple_comprobante = $next_id;
        $comprobante->fecha = $request->fecha;
        $comprobante->id_viaje = $request->viaje;
        $comprobante->id_camioneros = $request->camionero;
        $comprobante->detalles = $request->detalles;
        $comprobante->tipo = $request->tipo;
        $comprobante->monto = $request->monto;
        $comprobante->created_at = Carbon::now();
        $comprobante->updated_at = Carbon::now();
        $comprobante->save(['timestamps' => false]);

        return redirect()->route('comprobantes.index')
                        ->with('success','Comprobante ingresado correctamente.');
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
        $comprobante = Comprobante::find($id);
        return view('comprobantes.edit',compact('comprobante'));
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
            'fecha' => 'required',
            'camionero' => 'required',
            'detalles' => 'required',
            'tipo' => 'required',
            'monto' => 'required'
        ]);

        $comprobante = Comprobante::find($id);
        $comprobante->id_viaje = $request->viaje;
        $comprobante->fecha = $request->fecha;
        $comprobante->id_camioneros = $request->camionero;
        $comprobante->detalles = $request->detalles;
        $comprobante->tipo = $request->tipo;
        $comprobante->monto = $request->monto;
        $comprobante->save(['timestamps' => false]);

        return redirect()->route('comprobantes.index')
                        ->with('success','Comprobante actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comprobante = Comprobante::find($id);
        $comprobante->delete();
        return redirect()->route('comprobantes.index')
                        ->with('success','Comprobante eliminado');
    }
}
