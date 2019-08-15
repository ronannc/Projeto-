<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_back');
            $table->foreign('id_back')->references('id')->on('backs');
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
        Schema::dropIfExists('back_workout');
    }
}
