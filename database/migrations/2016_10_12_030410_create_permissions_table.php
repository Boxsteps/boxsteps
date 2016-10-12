<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('feature_id')->unsigned();
            $table->foreign('feature_id', 'fk_permissions_features')->references('id')->on('features');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id', 'fk_permissions_roles')->references('id')->on('roles');

            $table->index('feature_id', 'fk_permissions_features_idx');
            $table->index('role_id', 'fk_permissions_roles_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}
