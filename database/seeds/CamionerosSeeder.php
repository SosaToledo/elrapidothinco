<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CamionerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camioneros')->insert([
            'id_simple_camioneros' => 22,
            'DNI' => 35209418,
            'telefono' => 2700,
            'nombre' => 'el lucho',
            'apellido' => 'Sosa',
            'direccion' => 'akosndpdifnad',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
