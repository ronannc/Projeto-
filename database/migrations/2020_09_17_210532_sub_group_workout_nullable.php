<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubGroupWorkoutNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lower_member_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
        });

        Schema::table('breast_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
        });

        Schema::table('biceps_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
        });

        Schema::table('triceps_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
        });

        Schema::table('back_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
        });

        Schema::table('shoulder_workouts', function (Blueprint $table) {
            $table->string('sub_group')->nullable()->change();
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
