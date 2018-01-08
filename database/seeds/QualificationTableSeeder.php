<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Evaluation;

class QualificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $evaluations = Evaluation::all();

        foreach ($evaluations as $evaluation) {
            $students = $evaluation->course->students;

            if ( Carbon::now()->gt($evaluation->start_date) ) {
                foreach ($students as $student) {
                    $evaluation->students()->syncWithoutDetaching([$student->id => ['qualification' => $faker->numberBetween($min = 5, $max = 20)]]);
                }
            }
        }
    }
}
