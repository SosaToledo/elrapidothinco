<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'ciudad_nombre' => 'Pergamino',
            'cp' => 2700,
            'provincia_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ciudades')->insert([
            'ciudad_nombre' => 'San Nicolas',
            'cp' => 2701,
            'provincia_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ciudades')->insert([
            'ciudad_nombre' => 'Colon',
            'cp' => 2702,
            'provincia_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
