<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOmbrosTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ombros_treino', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_ombro');
            $table->foreign('id_ombro')->references('id')->on('ombros');
            $table->integer('id_treino');
            $table->foreign('id_treino')->references('id')->on('treinos');
            $table->string('kg')->nullable();
            $table->string('serie')->nullable();
            $table->string('rep')->nullable();
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
        Schema::dropIfExists('ombros_treino');
    }
}
