<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = array(
            ['role' => 'Administrador', 'created_at' => Carbon::now()],
            ['role' => 'Coordinador', 'created_at' => Carbon::now()],
            ['role' => 'Docente', 'created_at' => Carbon::now()]
        );
        DB::table('roles')->insert($inserts);
    }
}
