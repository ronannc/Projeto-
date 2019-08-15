<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreastsWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breasts_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('breast_ids');
            $table->foreign('breast_ids')->references('id')->on('breasts');
            $table->integer('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts');
            $table->integer('workout_id_modes');
            $table->foreign('workout_id_modes')->references('id')->on('workout_modes');
            $table->string('load')->nullable();
            $table->string('series')->nullable();
            $table->string('repetition')->nullable();
            $table->string('group')->nullable();

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
        Schema::dropIfExists('breasts_workout');
    }
}
