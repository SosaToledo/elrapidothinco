<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CamionesSeeder extends Seeder
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

        DB::table('camiones')
        ->whereIn('camiones.id',$ids)
        ->delete();

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('camiones')->insert([
                'id'=>$id,
                'id_simple_camiones' => 'CA00'.$id,
                'patente' => $faker->numerify('########'),
                'vtv_vencimiento' => $faker->dateTimeBetween('+0 days','+2 years'),
                'senasa_vencimiento' => $faker->dateTimeBetween('+0 days','+2 years'),
                'seguro_vencimiento' => $faker->dateTimeBetween('+0 days','+2 years'),
                'ruta_vencimiento' => $faker->dateTimeBetween('+0 days','+2 years'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
        }
    }
}
