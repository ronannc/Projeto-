<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosInferioresTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros_inferiores_treino', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_membro_inferior');
            $table->foreign('id_membro_inferior')->references('id')->on('membros_inferiores');
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
        Schema::dropIfExists('membros_inferiores_treino');
    }
}
