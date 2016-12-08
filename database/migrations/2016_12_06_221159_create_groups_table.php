<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id', 'fk_groups_students')->references('id')->on('students');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id', 'fk_groups_courses')->references('id')->on('courses');

            $table->index('student_id', 'fk_groups_students_idx');
            $table->index('course_id', 'fk_groups_courses_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }
}
