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
            [ 'knowledge_area' => 'Lengua y literatura', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Matemática', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Ciencias de la naturaleza y tecnología', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Ciencias sociales', 'created_at' => Carbon::now() ],
            [ 'knowledge_area' => 'Educación estética', 'created_at' => Carbon::now() ],
        );
        DB::table('knowledge_areas')->insert($inserts);
    }
}
