<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('states_id')->unsigned();
            $table->foreign('states_id', 'fk_conditions_states')->references('id')->on('states');

            $table->integer('plans_id')->unsigned()->nullable();
            $table->foreign('plans_id', 'fk_conditions_plans')->references('id')->on('plans');
            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id', 'fk_conditions_users')->references('id')->on('users');
            $table->integer('messages_id')->unsigned()->nullable();
            $table->foreign('messages_id', 'fk_conditions_messages')->references('id')->on('messages');
            $table->integer('notifications_id')->unsigned()->nullable();
            $table->foreign('notifications_id', 'fk_cond_noti')->references('id')->on('notifications');

            $table->index('states_id', 'fk_conditions_states_idx');

            $table->index('plans_id', 'fk_conditions_plans_idx');
            $table->index('users_id', 'fk_conditions_users_idx');
            $table->index('messages_id', 'fk_conditions_messages_idx');
            $table->index('messages_id', 'fk_cond_noti_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conditions');
    }
}
