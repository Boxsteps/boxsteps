<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InstitutionsTableSeeder extends Seeder
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
                'institution' => 'Colegio San Pedro',
                'address' => 'Avenida Universitaria, Caracas 1040, Distrito Capital',
                'phone' => '0212-6627090',
                'created_at' => Carbon::now()
            ]
        );
        DB::table('institutions')->insert($inserts);
    }
}
