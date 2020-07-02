<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'id_simple_clientes' => 1,
            'CUIL' => 20352094189,
            'nombre' => 'Luciano Sosa',
            'direccion' => 'por ahi',
            'telefono' => 152200,
            'correo' => 'lcuainos@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'id_simple_clientes' => 1,
            'CUIL' => 20452001529,
            'nombre' => 'Frank Toledo',
            'direccion' => 'casa fea',
            'telefono' => 15267200,
            'correo' => 'elfrankie@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
