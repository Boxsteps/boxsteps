<?php

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
        $roles = array(
            ['id' => 1, 'role' => 'Administrador'],
            ['id' => 2, 'role' => 'Coordinador'],
            ['id' => 3, 'role' => 'Docente']
        );
        DB::table('roles')->insert( $roles );
    }
}
