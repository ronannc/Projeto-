<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start');
            $table->date('next_workout');
            $table->string('note');
            $table->string('goal');
            $table->string('interval');
            $table->string('frequency');
            $table->integer('id_method')->nullable();
            $table->foreign('id_method')->references('id')->on('method');
            $table->integer('id_client')->nullable();
            $table->foreign('id_client')->references('id')->on('clients');
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
        Schema::dropIfExists('training');
    }
}
