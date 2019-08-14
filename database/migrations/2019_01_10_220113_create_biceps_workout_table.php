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
            $table->integer('id_training');
            $table->foreign('id_training')->references('id')->on('training');
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
