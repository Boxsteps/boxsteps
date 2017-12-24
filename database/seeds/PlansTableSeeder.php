<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $inserts = array(
            [
                'course_id' => 1,
                'conceptual_section_id' => $faker->numberBetween($min = 1, $max = 55),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 7:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 1,
                'conceptual_section_id' => $faker->numberBetween($min = 56, $max = 110),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 1,
                'conceptual_section_id' => $faker->numberBetween($min = 111, $max = 170),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 1:00 PM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 2,
                'conceptual_section_id' => $faker->numberBetween($min = 1, $max = 55),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 7:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 2,
                'conceptual_section_id' => $faker->numberBetween($min = 56, $max = 110),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 2,
                'conceptual_section_id' => $faker->numberBetween($min = 111, $max = 170),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 1:00 PM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 3,
                'conceptual_section_id' => $faker->numberBetween($min = 1, $max = 55),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 7:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 3,
                'conceptual_section_id' => $faker->numberBetween($min = 56, $max = 110),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 9:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 3,
                'conceptual_section_id' => $faker->numberBetween($min = 111, $max = 170),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 11:00 AM' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i A', Carbon::now()->format('d-m-Y') . ' 1:00 PM' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'period_id' => 1,
                'created_at' => Carbon::now()
            ],
        );

        DB::table('plans')->insert($inserts);
    }
}
