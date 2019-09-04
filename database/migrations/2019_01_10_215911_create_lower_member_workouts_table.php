<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowerMemberWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lower_member_workouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('load')->nullable();
            $table->string('series')->nullable();
            $table->time('rest_time')->nullable();
            $table->string('repetition')->nullable();
            $table->string('group')->nullable();

            $table->uuid('lower_member_id');
            $table->foreign('lower_member_id')->references('id')->on('lower_members');

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
        Schema::dropIfExists('lower_member_workouts');
    }
}
