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

            $table->integer('state_id')->unsigned();
            $table->foreign('state_id', 'fk_conditions_states')->references('id')->on('states');

            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign('plan_id', 'fk_conditions_plans')->references('id')->on('plans');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_conditions_users')->references('id')->on('users');
            $table->integer('message_id')->unsigned()->nullable();
            $table->foreign('message_id', 'fk_conditions_messages')->references('id')->on('messages');
            $table->integer('notification_id')->unsigned()->nullable();
            $table->foreign('notification_id', 'fk_cond_noti')->references('id')->on('notifications');

            $table->index('state_id', 'fk_conditions_states_idx');

            $table->index('plan_id', 'fk_conditions_plans_idx');
            $table->index('user_id', 'fk_conditions_users_idx');
            $table->index('message_id', 'fk_conditions_messages_idx');
            $table->index('notification_id', 'fk_cond_noti_idx');

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
