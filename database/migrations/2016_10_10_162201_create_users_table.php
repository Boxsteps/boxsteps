<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('second_name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_users_users')->references('id')->on('users');
            $table->integer('roles_id')->unsigned();
            $table->foreign('roles_id', 'fk_users_roles')->references('id')->on('roles');

            $table->unique('email', 'uq_email');

            $table->index('user_id', 'fk_users_users_idx');
            $table->index('roles_id', 'fk_users_roles_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
