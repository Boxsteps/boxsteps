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
        $dt = new DateTime;
        
        $inserts = array(
            ['role' => 'Administrador', 'created_at' => $dt->format('d-m-y H:i:s')],
            ['role' => 'Coordinador', 'created_at' => $dt->format('d-m-y H:i:s')],
            ['role' => 'Docente', 'created_at' => $dt->format('d-m-y H:i:s')]
        );
        DB::table('roles')->insert( $inserts );
    }
}
