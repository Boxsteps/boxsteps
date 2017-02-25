<?php

use Carbon\Carbon;
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
        $inserts = array(
            [
                'message' => 'Mensaje de bienvenida a Boxsteps por parte del administrador',
                'created_at' => Carbon::now(),
                'user_id' => 1
            ]
        );
        DB::table('messages')->insert($inserts);

        factory(App\Message::class, 9)->create();
    }
}
