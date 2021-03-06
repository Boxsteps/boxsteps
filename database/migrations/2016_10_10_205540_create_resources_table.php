<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {

            $table->increments('id');
            $table->string('resource');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id', 'fk_resources_plans')->references('id')->on('plans');

            $table->index('plan_id', 'fk_resources_plans_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resources');
    }
}
