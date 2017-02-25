<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EvaluationScalesTableSeeder extends Seeder
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
                'notation' => 'PC',
                'maximum_equivalent' => '20',
                'minimum_equivalent' => '19',
                'created_at' => Carbon::now(),
                'evaluation_type_id' => 2
            ],
            [
                'notation' => 'PA',
                'maximum_equivalent' => '18',
                'minimum_equivalent' => '16',
                'created_at' => Carbon::now(),
                'evaluation_type_id' => 2
            ],
            [
                'notation' => 'PS',
                'maximum_equivalent' => '15',
                'minimum_equivalent' => '12',
                'created_at' => Carbon::now(),
                'evaluation_type_id' => 2
            ],
            [
                'notation' => 'PI',
                'maximum_equivalent' => '11',
                'minimum_equivalent' => '10',
                'created_at' => Carbon::now(),
                'evaluation_type_id' => 2
            ],
            [
                'notation' => 'I',
                'maximum_equivalent' => '9',
                'minimum_equivalent' => '0',
                'created_at' => Carbon::now(),
                'evaluation_type_id' => 2
            ],
        );
        DB::table('evaluation_scales')->insert($inserts);
    }
}
