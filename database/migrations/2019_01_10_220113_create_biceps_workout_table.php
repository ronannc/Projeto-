<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicepsWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biceps_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_biceps');
            $table->foreign('id_biceps')->references('id')->on('biceps');
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
        Schema::dropIfExists('biceps_workout');
    }
}
