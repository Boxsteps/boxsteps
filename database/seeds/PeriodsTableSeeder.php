<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
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
                'period' => '2016-2017',
                'created_at' => Carbon::now()
            ]
        );
        DB::table('periods')->insert($inserts);
    }
}
