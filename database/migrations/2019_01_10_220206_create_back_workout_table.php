<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('id_costa');
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
        Schema::dropIfExists('back_workout');
    }
}
