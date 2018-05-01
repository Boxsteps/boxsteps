<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Messages condition

        $faker = Faker::create();

        foreach (range(1,6) as $index) {
            DB::table('conditions')->insert([
                'state_id' => 4,
                'created_at' => Carbon::now(),
                'user_id' => $index,
                'message_id' => $index
            ]);
        }

        foreach (range(1,9) as $index) {
            DB::table('conditions')->insert([
                'state_id' => 4,
                'user_id' => $faker->numberBetween($min = 1, $max = 6),
                'message_id' => $index + 6
            ]);
        }

        // Plans condition

        $user = User::findOrFail(3);
        foreach (range(1,30) as $plan) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }

        $user = User::findOrFail(5);
        foreach (range(31,60) as $plan) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }

        $user = User::findOrFail(8);
        foreach (range(61,90) as $plan) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }

        $user = User::findOrFail(7);
        foreach (range(91,96) as $plan) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }
    }
}
