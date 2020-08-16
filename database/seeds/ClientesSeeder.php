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
        $faker = Faker\Factory::create();

        /* Estos son los id que generamos y borramos */
        $ids=[1,2,3,4,5,6,7,8,9];

        DB::table('clientes')
        ->whereIn('clientes.id',$ids)
        ->delete();

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('clientes')->insert([
                'id'=>$id,
                'id_simple_clientes' => 'CL00'.$id,
                'CUIL' => $faker->numerify('###########'),
                'nombre' => $faker->firstName(),
                'direccion' => $faker->sentence(2).' '.$faker->numerify('##'),
                'telefono' => $faker->numerify('##########'),
                'correo' => $faker->email(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }
    }
}
