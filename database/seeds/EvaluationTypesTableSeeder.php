<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EvaluationTypesTableSeeder extends Seeder
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
                'name' => 'Escala de evaluación 0..20',
                'evaluation_type' => 'Cuantitativa',
                'maximum_qualification' => '20',
                'minimum_qualification' => '0',
                'approved_qualification' => '10',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Escala de evaluación I..PC',
                'evaluation_type' => 'Cualitativa',
                'maximum_qualification' => '20',
                'minimum_qualification' => '0',
                'approved_qualification' => '10',
                'created_at' => Carbon::now()
            ]
        );
        DB::table('evaluation_types')->insert($inserts);
    }
}
