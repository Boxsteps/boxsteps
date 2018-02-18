<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,6) as $index) {
            DB::table('messages')->insert([
                'message' => 'Mensaje de bienvenida a Boxsteps por parte del administrador',
                'created_at' => Carbon::now(),
                'user_id' => 1
            ]);
        }

        foreach (range(1,9) as $index) {
            DB::table('messages')->insert([
                'message' => $faker->sentence($nbWords = 15, $variableNbWords = true),
                'created_at' => Carbon::now(),
                'user_id' => $faker->numberBetween($min = 1, $max = 6)
            ]);
        }
    }
}
