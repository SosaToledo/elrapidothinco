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
        $camioneros = Camionero::All();
        $detalles_sueldo = [];
        return view('sueldos.index',compact('camioneros'))->with(compact('detalles_sueldo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $detalles_sueldo = DB::select('
        //     SELECT c.nombre, v.id, c.apellido, v.ganancia_camionero, v.fecha, v.peajes, com.monto
        //     FROM viajes v
        //     JOIN camioneros c ON v.id = v.id 
        //     JOIN comprobantes com ON com.id_camioneros = v.id_camionero
        //     WHERE c.id ='.$request->camionero.'
        //         AND v.fecha BETWEEN "'.$request->fecha_inicio.'" AND "'.$request->fecha_fin.'"
        // ');

        $detalles_sueldo = DB::table('camioneros')
        ->select('camioneros.nombre','viajes.id', 'camioneros.apellido','viajes.ganancia_camionero', 'viajes.fecha', 'viajes.peajes', DB::raw('SUM(comprobantes.monto) as monto'))
        ->rightJoin('viajes', 'camioneros.id', '=', 'viajes.id_camionero')
        ->rightJoin('comprobantes', 'comprobantes.id_camioneros', '=', 'viajes.id_camionero')
        ->where('camioneros.id', $request->camionero)
        ->whereBetween('viajes.fecha', [$request->fecha_inicio, $request->fecha_fin])
        ->groupby('camioneros.nombre','viajes.id', 'camioneros.apellido','viajes.ganancia_camionero', 'viajes.fecha', 'viajes.peajes')
        ->get();

        $camioneros = Camionero::All();

        return view('sueldos.index')
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
