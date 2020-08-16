<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FuncionesComunes;
use Carbon\Carbon;

class AcopladosSeeder extends Seeder
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

        DB::table('Acoplado')
        ->whereIn('Acoplado.id',$ids)
        ->delete();

        /* Con los id borrados  */
        foreach ($ids as $id) {
            DB::table('acoplado')->insert([
                'id'=>$id,
                'id_simple_acoplado' => 'AC00'.$id,
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
