<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowerMembersWorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lower_members_workout', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_lower_members');
            $table->foreign('id_lower_members')->references('id')->on('lower_members');
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
        Schema::dropIfExists('lower_members_workout');
    }
}
