<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptualSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptual_sections', function (Blueprint $table) {

            $table->increments('id');
            $table->string('conceptual_section');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('knowledge_area_id')->unsigned();
            $table->foreign('knowledge_area_id', 'fk_conc_sect_know_area')->references('id')->on('knowledge_areas');

            $table->index('knowledge_area_id', 'fk_conc_sect_know_area_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conceptual_sections');
    }
}
