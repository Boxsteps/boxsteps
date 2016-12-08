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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'fk_courses_users')->references('id')->on('users');

            $table->index('period_id', 'fk_courses_periods_idx');
            $table->index('user_id', 'fk_courses_users_idx');

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
