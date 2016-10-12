<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_scales', function (Blueprint $table) {

            $table->increments('id');
            $table->string('notation');
            $table->string('maximum_equivalent')->nullable();
            $table->string('minimum_equivalent')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('evaluation_type_id')->unsigned();
            $table->foreign('evaluation_type_id', 'fk_eval_scal_eval_type')->references('id')->on('evaluation_types');

            $table->index('evaluation_type_id', 'fk_eval_scal_eval_type_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evaluation_scales');
    }
}
