<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('grade');
            $table->string('section');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('periods_id')->unsigned();
            $table->foreign('periods_id', 'fk_courses_periods')->references('id')->on('periods');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id', 'fk_courses_students')->references('id')->on('students');

            $table->index('periods_id', 'fk_courses_periods_idx');
            $table->index('students_id', 'fk_courses_students_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
