<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {

            $table->increments('id');
            $table->string('feature');
            $table->string('icon')->nullable();
            $table->text('url');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('feature_id')->unsigned()->nullable();
            $table->foreign('feature_id', 'fk_features_features')->references('id')->on('features');

            $table->index('feature_id', 'fk_features_features_idx');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('features');
    }
}
