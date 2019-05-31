<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeitoraisTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peitorais_treino', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_peitoral');
            $table->foreign('id_peitoral')->references('id')->on('peitorais');
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
        Schema::dropIfExists('peitorais_treino');
    }
}
