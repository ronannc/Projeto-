<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreastWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breast_workouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('load')->nullable();
            $table->string('series')->nullable();
            $table->time('rest_time')->nullable();
            $table->string('repetition')->nullable();
            $table->string('group')->nullable();

            $table->uuid('breast_id');
            $table->foreign('breast_id')->references('id')->on('breasts');

            $table->uuid('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts');

            $table->uuid('workout_mode_id');
            $table->foreign('workout_mode_id')->references('id')->on('workout_modes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breast_workouts');
    }
}
