<?php

namespace App\Http\Controllers;

use App\Acoplado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AcopladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acoplados = Acoplado::latest()->paginate(10);
  
        return view('acoplados.index',compact('acoplados'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('acoplados.create');
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
            'vtv_vencimiento' => 'required',
            'senasa_vencimiento' => 'required',
            'seguro_vencimiento' => 'required',
        ]);
  
        $id=DB::select("SHOW TABLE STATUS LIKE 'acoplado'");
        $next_id=$id[0]->Auto_increment;

        /* $request->id_simple_acoplado = $next_id;
        Acoplado::create($request->all()); */
   
        $acoplado = new Acoplado;
        $acoplado->id_simple_acoplado = $next_id;
        $acoplado->patente = $request->patente;
        $acoplado->vtv_vencimiento = $request->vtv_vencimiento;
        $acoplado->senasa_vencimiento = $request->senasa_vencimiento;
        $acoplado->seguro_vencimiento = $request->seguro_vencimiento;
        
        $acoplado->created_at = Carbon::now();
        $acoplado->updated_at = Carbon::now();
        $acoplado->save(['timestamps' => false]);
        /* $acoplado->updated_at = DB::raw('CURRENT_TIMESTAMP(0)');
        $acoplado->created_at = DB::raw('CURRENT_TIMESTAMP(0)'); */
        //$acoplado->save();


        return redirect()->route('acoplados.index')
                        ->with('success','Acoplado ingresado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acoplado  $acoplado
     * @return \Illuminate\Http\Response
     */
    public function show(Acoplado $acoplado)
    {
        return view('acoplados.show',compact('acoplado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acoplado  $acoplado
     * @return \Illuminate\Http\Response
     */
    public function edit(Acoplado $acoplado)
    {
        return view('acoplados.edit',compact('acoplado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acoplado  $acoplado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acoplado $acoplado)
    {
        $request->validate([
            'patente' => 'required',
            'vtv_vencimiento' => 'required',
            'senasa_vencimiento' => 'required',
            'seguro_vencimiento' => 'required',
        ]);
  
        $acoplado ->update($request->all());
  
        return redirect()->route('acoplados.index')
                        ->with('success','Acoplado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acoplado  $acoplado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acoplado $acoplado)
    {
        Acoplado::destroy($acoplado->id);
 
        return redirect()->route('acoplados.index')
                        ->with('success','Acoplado eliminado');
    }
}
