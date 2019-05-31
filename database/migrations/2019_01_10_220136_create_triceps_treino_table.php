<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTricepsTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triceps_treino', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_triceps');
            $table->foreign('id_triceps')->references('id')->on('triceps');
            $table->integer('id_treino');
            $table->foreign('id_treino')->references('id')->on('treinos');
            $table->string('kg')->nullable();
            $table->string('serie')->nullable();
            $table->string('rep')->nullable();
            $table->string('grupo')->nullable();

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
        Schema::dropIfExists('triceps_treino');
    }
}
