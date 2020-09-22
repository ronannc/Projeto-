<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubGroupWorkout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lower_member_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });

        Schema::table('breast_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });

        Schema::table('biceps_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });

        Schema::table('triceps_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });

        Schema::table('back_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });

        Schema::table('shoulder_workouts', function (Blueprint $table) {
            $table->string('sub_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
