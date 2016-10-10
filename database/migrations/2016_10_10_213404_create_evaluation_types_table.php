<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_types', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('evaluation_type');
            $table->string('maximum_qualification');
            $table->string('minimum_qualification');
            $table->string('approved_qualification');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluation_types');
    }
}
