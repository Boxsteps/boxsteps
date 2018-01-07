<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Plan;

class EvaluationTableSeeder extends Seeder
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

        foreach (Plan::all() as $plan) {

            $date = $plan->start_date->addDays(7);

            $inserts->push([
                'name' => 'Evaluación # ' . $plan->id,
                'representative_percentage' => $faker->numberBetween($min = 1, $max = 8) * 5,
                'start_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 7, $max = 9) . ':00' ),
                'end_date' => Carbon::createFromFormat( 'd-m-Y h:i', $date->format('d-m-Y') . ' ' . $faker->numberBetween($min = 10, $max = 12) . ':00' ),
                'plan_id' => $plan->id,
                'course_id' => $plan->course_id,
                'evaluation_type_id' => 1,
                'created_at' => Carbon::now()
            ]);
        }

        DB::table('evaluations')->insert($inserts->toArray());
    }
}
