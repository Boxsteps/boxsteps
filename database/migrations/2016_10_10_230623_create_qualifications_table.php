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
            $table->string('qualification');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('evaluations_id')->unsigned();
            $table->foreign('evaluations_id', 'fk_qual_eval')->references('id')->on('evaluations');
            $table->integer('students_id')->unsigned();
            $table->foreign('students_id', 'fk_qual_stud')->references('id')->on('students');

            $table->index('evaluations_id', 'fk_qual_eval_idx');
            $table->index('students_id', 'fk_qual_stud_idx');

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
