<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {

            $table->increments('id');
            $table->string('qualification')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('evaluation_id')->unsigned();
            $table->foreign('evaluation_id', 'fk_qual_eval')->references('id')->on('evaluations');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id', 'fk_qual_stud')->references('id')->on('students');

            $table->index('evaluation_id', 'fk_qual_eval_idx');
            $table->index('student_id', 'fk_qual_stud_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qualifications');
    }
}
