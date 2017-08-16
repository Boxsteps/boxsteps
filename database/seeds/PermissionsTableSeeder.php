<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = array(
            ['feature_id' => 1, 'role_id' => 2, 'created_at' => Carbon::now()],
            ['feature_id' => 1, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 2, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 3, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 6, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 7, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 8, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 9, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 10, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 11, 'role_id' => 3, 'created_at' => Carbon::now()],
            ['feature_id' => 4, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['feature_id' => 5, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['feature_id' => 12, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['feature_id' => 13, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['feature_id' => 14, 'role_id' => 1, 'created_at' => Carbon::now()],
            ['feature_id' => 15, 'role_id' => 1, 'created_at' => Carbon::now()],
        );
        DB::table('permissions')->insert($inserts);
    }
}
