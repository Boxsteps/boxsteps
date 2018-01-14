<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class KnowledgeAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = array(
            [ 'knowledge_area' => 'Lengua y literatura', 'branch' => 'Área humanista', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Matemática', 'branch' => 'Área científica', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Ciencias de la naturaleza y tecnología', 'branch' => 'Área científica', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Ciencias sociales', 'branch' => 'Área humanista', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Educación estética', 'branch' => 'Área humanista', 'created_at' => Carbon::now() ],
        );
        DB::table('knowledge_areas')->insert($inserts);
    }
}
