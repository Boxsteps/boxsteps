<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = array(
            [ 'state' => 'Esperando', 'created_at' => Carbon::now() ],
            [ 'state' => 'Aprobado', 'created_at' => Carbon::now() ],
            [ 'state' => 'Realizado', 'created_at' => Carbon::now() ],
            [ 'state' => 'No leído', 'created_at' => Carbon::now() ],
            [ 'state' => 'Leído', 'created_at' => Carbon::now() ]
        );
        DB::table('states')->insert($inserts);
    }
}
