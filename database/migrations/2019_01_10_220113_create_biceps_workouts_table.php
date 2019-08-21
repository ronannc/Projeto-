<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicepsWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biceps_workouts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('biceps_id');
            $table->foreign('biceps_id')->references('id')->on('biceps');
            $table->integer('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts');
            $table->integer('workout_id_modes');
            $table->foreign('workout_id_modes')->references('id')->on('workout_modes');
            $table->string('load')->nullable();
            $table->string('series')->nullable();
            $table->time('rest_time')->nullable();
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
        Schema::dropIfExists('biceps_workouts');
    }
}
