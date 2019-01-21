<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercicioTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicios_treino', function (Blueprint $table) {

            $table->integer('id_treino');
            $table->foreign('id_treino')->references('id')->on('treinos');

            $table->integer('id_membros_inferiores');
            $table->foreign('id_membros_inferiores')->references('id')->on('membros_inferiores');

            $table->integer('id_peitorais');
            $table->foreign('id_peitorais')->references('id')->on('peitorais');

            $table->integer('id_biceps');
            $table->foreign('id_biceps')->references('id')->on('biceps');

            $table->integer('id_triceps');
            $table->foreign('id_triceps')->references('id')->on('triceps');

            $table->integer('id_costa');
            $table->foreign('id_costa')->references('id')->on('costa');

            $table->integer('id_ombro');
            $table->foreign('id_ombro')->references('id')->on('ombros');


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
        Schema::dropIfExists('exercicio_treino');
    }
}
