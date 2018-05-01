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
        foreach (range(1,40) as $student) {
            $course->students()->syncWithoutDetaching([$student]);
        }

        $course = Course::findOrFail(2);
        foreach (range(41,80) as $student) {
            $course->students()->syncWithoutDetaching([$student]);
        }

        $course = Course::findOrFail(3);
        foreach (range(81,120) as $student) {
            $course->students()->syncWithoutDetaching([$student]);
        }

        $course = Course::findOrFail(4);
        foreach (range(121,171) as $student) {
            $course->students()->syncWithoutDetaching([$student]);
        }
    }
}
