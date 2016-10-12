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

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id', 'fk_courses_periods')->references('id')->on('periods');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id', 'fk_courses_students')->references('id')->on('students');

            $table->index('period_id', 'fk_courses_periods_idx');
            $table->index('student_id', 'fk_courses_students_idx');

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
