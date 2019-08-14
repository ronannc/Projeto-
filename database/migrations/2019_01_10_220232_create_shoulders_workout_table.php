<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShouldersWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoulders_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_shoulders');
            $table->foreign('id_shoulders')->references('id')->on('shoulders');
            $table->integer('id_workout');
            $table->foreign('id_workout')->references('id')->on('workouts');
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
        Schema::dropIfExists('shoulders_workout');
    }
}
