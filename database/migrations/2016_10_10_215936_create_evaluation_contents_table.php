<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_contents', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('evaluation_id')->unsigned();
            $table->foreign('evaluation_id', 'fk_eval_cont_evaluations')->references('id')->on('evaluations');
            $table->integer('conceptual_section_id')->unsigned();
            $table->foreign('conceptual_section_id', 'fk_eval_cont_conc_sect')->references('id')->on('conceptual_sections');

            $table->index('evaluation_id', 'fk_eval_cont_evaluations_idx');
            $table->index('conceptual_section_id', 'fk_eval_cont_conc_sect_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluation_contents');
    }
}
