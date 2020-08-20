<?php

namespace App\Http\Controllers;

use App\Camionero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SueldosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camioneros = Camionero::orderBy('apellido','ASC')->get();
        $detalles_sueldo = [];
        return view('Sueldos.index',compact('camioneros'))
                ->with(compact('detalles_sueldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $detalles_sueldo = DB::table('camioneros')
        ->select('camioneros.nombre','viajes.id','viajes.guia' ,'viajes.idSimpleViaje', 'camioneros.apellido','viajes.ganancia_camionero', 'viajes.fecha', 'viajes.peajes')
        ->rightJoin('viajes', 'camioneros.id', '=', 'viajes.id_camionero')
        ->where('camioneros.id', $request->camionero)
        ->whereBetween('viajes.fecha', [$request->fecha_inicio, $request->fecha_fin])
        ->orderBy('viajes.idSimpleViaje')
        ->get();

        $detalles_adelanto = DB::table('comprobantes')
        ->select('comprobantes.fecha','comprobantes.id_simple_comprobante', 'comprobantes.monto','comprobantes.id' ,'comprobantes.id_viaje','comprobantes.detalles','viajes.idSimpleViaje')
        ->leftjoin('viajes','comprobantes.id_viaje','=','viajes.id')
        ->where('tipo', 'adelanto')
        ->whereBetween('comprobantes.fecha', [$request->fecha_inicio, $request->fecha_fin])
        ->orderBy('comprobantes.id_simple_comprobante')
        ->get();

        $camioneros = Camionero::orderBy('apellido','ASC')->get();

        return view('Sueldos.index')
        ->with(compact('detalles_adelanto'))
        ->with(compact('detalles_sueldo'))
        ->with(compact('camioneros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
