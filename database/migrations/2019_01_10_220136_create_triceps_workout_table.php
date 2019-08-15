<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTricepsWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triceps_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_triceps');
            $table->foreign('id_triceps')->references('id')->on('triceps');
            $table->integer('id_workout');
            $table->foreign('id_workout')->references('id')->on('workouts');
            $table->integer('id_workout_modes');
            $table->foreign('id_workout_modes')->references('id')->on('workout_modes');
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
        Schema::dropIfExists('triceps_workout');
    }
}
