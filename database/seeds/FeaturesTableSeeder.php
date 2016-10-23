<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
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
            ['feature' => 'Planificación', 'url' => '#', 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Calificaciones', 'url' => '#', 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Estadísticas', 'url' => '#', 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Usuario', 'url' => '#', 'created_at' => $dt->format('d-m-y H:i:s')]
        );
        DB::table('features')->insert( $inserts );

        $inserts = array(
            ['feature' => 'Crear planificación', 'url' => '#', 'feature_id' => 1, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Listar planificación', 'url' => '#', 'feature_id' => 1, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Evaluar planificación', 'url' => '#', 'feature_id' => 1, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Crear evaluación', 'url' => '#', 'feature_id' => 2, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Listar evaluaciones', 'url' => '#', 'feature_id' => 2, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Asignar calificaciones', 'url' => '#', 'feature_id' => 2, 'created_at' => $dt->format('d-m-y H:i:s')],
            ['feature' => 'Crear usuario', 'url' => '#', 'feature_id' => 4, 'created_at' => $dt->format('d-m-y H:i:s')]
        );
        DB::table('features')->insert( $inserts );
    }
}