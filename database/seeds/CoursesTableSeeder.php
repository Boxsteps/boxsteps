<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
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
                'grade' => '6',
                'section' => 'A',
                'period_id' => 1,
                'user_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'grade' => '6',
                'section' => 'B',
                'period_id' => 1,
                'user_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'grade' => '6',
                'section' => 'C',
                'period_id' => 1,
                'user_id' => 8,
                'created_at' => Carbon::now()
            ],
            [
                'grade' => 'GP-T',
                'section' => '017',
                'period_id' => 1,
                'user_id' => 7,
                'created_at' => Carbon::now()
            ]
        );
        DB::table('courses')->insert($inserts);
    }
}
