<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('representative_percentage');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id', 'fk_evaluations_courses')->references('id')->on('courses');
            $table->integer('evaluation_type_id')->unsigned();
            $table->foreign('evaluation_type_id', 'fk_evaluations_eval_type')->references('id')->on('evaluation_types');

            $table->index('course_id', 'fk_evaluations_courses_idx');
            $table->index('evaluation_type_id', 'fk_evaluations_eval_type_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluations');
    }
}
