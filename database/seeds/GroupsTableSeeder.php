<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Course;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::findOrFail(1);

        for ($students = 1; $students < 41 ; $students++) {
            $course->students()->syncWithoutDetaching([$students]);
        }

        $course = Course::findOrFail(2);

        for ($students = 41; $students < 81 ; $students++) {
            $course->students()->syncWithoutDetaching([$students]);
        }

        $course = Course::findOrFail(3);

        for ($students = 81; $students < 121 ; $students++) {
            $course->students()->syncWithoutDetaching([$students]);
        }
    }
}
