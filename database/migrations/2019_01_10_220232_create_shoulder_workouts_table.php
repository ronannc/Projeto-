<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoulderWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoulder_workouts', function (Blueprint $table) {
            $table->string('load')->nullable();
            $table->string('series')->nullable();
            $table->time('rest_time')->nullable();
            $table->string('repetition')->nullable();
            $table->string('group')->nullable();

            $table->uuid('shoulder_id');
            $table->foreign('shoulder_id')->references('id')->on('shoulders');

            $table->uuid('workout_id');
            $table->foreign('workout_id')->references('id')->on('workouts');


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
        Schema::dropIfExists('shoulder_workouts');
    }
}
