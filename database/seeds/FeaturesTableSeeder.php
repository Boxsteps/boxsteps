<?php

use Carbon\Carbon;
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
        $inserts = array(
            ['feature' => 'Planificación', 'url' => 'plans', 'icon' => 'fa-pencil-square-o', 'created_at' => Carbon::now()],
            ['feature' => 'Calificaciones', 'url' => '#', 'icon' => 'fa-check-square-o', 'created_at' => Carbon::now()],
            ['feature' => 'Estadísticas', 'url' => '#', 'icon' => 'fa-bar-chart-o', 'created_at' => Carbon::now()],
            ['feature' => 'Usuario', 'url' => 'users', 'icon' => 'fa-user', 'created_at' => Carbon::now()],
            ['feature' => 'Opciones', 'url' => 'options', 'icon' => 'fa-wrench', 'created_at' => Carbon::now()]
        );
        DB::table('features')->insert($inserts);

        $inserts = array(
            ['feature' => 'Crear planificación', 'url' => 'plans/create', 'feature_id' => 1, 'created_at' => Carbon::now()],
            ['feature' => 'Listar planificación', 'url' => 'plans', 'feature_id' => 1, 'created_at' => Carbon::now()],
            ['feature' => 'Evaluar planificación', 'url' => 'plans/evaluation', 'feature_id' => 1, 'created_at' => Carbon::now()],
            ['feature' => 'Crear evaluación', 'url' => 'evaluations/create', 'feature_id' => 2, 'created_at' => Carbon::now()],
            ['feature' => 'Listar evaluaciones', 'url' => 'evaluations', 'feature_id' => 2, 'created_at' => Carbon::now()],
            ['feature' => 'Asignar calificaciones', 'url' => 'qualifications', 'feature_id' => 2, 'created_at' => Carbon::now()],
            ['feature' => 'Crear usuario', 'url' => 'users/create', 'feature_id' => 4, 'created_at' => Carbon::now()],
            ['feature' => 'Listar usuario', 'url' => 'users', 'feature_id' => 4, 'created_at' => Carbon::now()],
            ['feature' => 'Roles', 'url' => 'roles', 'feature_id' => 5, 'created_at' => Carbon::now()],
            ['feature' => 'Funcionalidades', 'url' => 'features', 'feature_id' => 5, 'created_at' => Carbon::now()],
        );
        DB::table('features')->insert($inserts);
    }
}
