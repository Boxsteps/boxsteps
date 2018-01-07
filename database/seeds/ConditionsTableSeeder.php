<?php

use Carbon\Carbon;
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

        $message = Message::findOrFail(1);

        for ($user = 1; $user < 7 ; $user++) {
            $message->recipients()->syncWithoutDetaching([$user => ['state_id' => 4]]);
        }

        factory(App\Condition::class, 9)->create();

        // Plans condition

        $user = User::findOrFail(3);

        for ($plan = 1; $plan < 31 ; $plan++) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }

        $user = User::findOrFail(5);

        for ($plan = 31; $plan < 61 ; $plan++) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }

        $user = User::findOrFail(6);

        for ($plan = 61; $plan < 91 ; $plan++) {
            $user->plans()->syncWithoutDetaching([$plan => ['state_id' => 3]]);
        }
    }
}
