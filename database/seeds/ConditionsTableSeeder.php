<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = array(
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 1, 'message_id' => 1 ],
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 2, 'message_id' => 1 ],
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 3, 'message_id' => 1 ],
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 4, 'message_id' => 1 ],
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 5, 'message_id' => 1 ],
            [ 'created_at' => Carbon::now(), 'state_id' => 4, 'user_id' => 6, 'message_id' => 1 ]
        );
        DB::table('conditions')->insert($inserts);

        factory(App\Condition::class, 9)->create();
    }
}
