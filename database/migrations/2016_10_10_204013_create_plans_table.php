<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {

            $table->increments('id');
            $table->text('procedimental_section');
            $table->text('actitudinal_section');
            $table->text('competences');
            $table->text('indicators');
            $table->text('teaching_strategy');
            $table->text('teaching_sequence');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('score')->nullable();
            $table->string('completion_time')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id', 'fk_plans_periods')->references('id')->on('periods');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id', 'fk_plans_courses')->references('id')->on('courses');
            $table->integer('conceptual_section_id')->unsigned();
            $table->foreign('conceptual_section_id', 'fk_plans_conc_sect')->references('id')->on('conceptual_sections');

            $table->index('period_id', 'fk_plans_periods_idx');
            $table->index('course_id', 'fk_plans_courses_idx');
            $table->index('conceptual_section_id', 'fk_plans_conc_sect_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plans');
    }
}
