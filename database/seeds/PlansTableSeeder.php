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

        $inserts = collect();

        foreach (range(1,3) as $course) {
            foreach (range(1,30) as $plan) {

                $date = Carbon::createFromFormat( 'd-m-Y', $faker->unique()->dateTimeBetween('-30 days', 'now', null)->format('d-m-Y') );

                if ( $date->isWeekend() ) { $date->addDays(2); }

                $inserts->push([
                    'period_id' => 1,
                    'course_id' => $course,
                    'conceptual_section_id' => $faker->unique()->numberBetween($min = 1, $max = 170),
                    'start_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 7, $max = 9) . ':00' ),
                    'end_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 10, $max = 12) . ':00' ),
                    'procedimental_section' => $faker->sentence(100),
                    'actitudinal_section' => $faker->sentence(100),
                    'competences' => $faker->sentence(100),
                    'indicators' => $faker->sentence(100),
                    'teaching_strategy' => $faker->sentence(100),
                    'teaching_sequence' => $faker->sentence(100),
                    'observations' => $faker->sentence(100),
                    'score' => $faker->numberBetween($min = 1, $max = 5),
                    'completion_time' => $faker->numberBetween($min = 1, $max = 3),
                    'created_at' => Carbon::now()
                ]);

            }
        }

        foreach (range(1,6) as $plan) {

            $date = Carbon::createFromFormat( 'd-m-Y', Carbon::now()->subDays(30)->format('d-m-Y') );

            $date->addDays($plan * 3);

            if ( $date->isWeekend() ) { $date->addDays(2); }

            $inserts->push([
                'period_id' => 1,
                'course_id' => 4,
                'conceptual_section_id' => $faker->unique()->numberBetween($min = 61, $max = 115),
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 7, $max = 9) . ':00' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 10, $max = 12) . ':00' ),
                'procedimental_section' => $faker->sentence(100),
                'actitudinal_section' => $faker->sentence(100),
                'competences' => $faker->sentence(100),
                'indicators' => $faker->sentence(100),
                'teaching_strategy' => $faker->sentence(100),
                'teaching_sequence' => $faker->sentence(100),
                'observations' => $faker->sentence(100),
                'score' => $faker->numberBetween($min = 3, $max = 5),
                'completion_time' => $faker->numberBetween($min = 1, $max = 3),
                'created_at' => Carbon::now()
            ]);

        }

        DB::table('plans')->insert($inserts->toArray());
    }
}
