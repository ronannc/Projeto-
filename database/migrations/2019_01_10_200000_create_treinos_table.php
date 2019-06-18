<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('inicio');
            $table->date('prox_ficha');
            $table->string('descricao');
            $table->string('objetivo');
            $table->string('intervalo');
            $table->string('metodo');
            $table->string('frequencia');
            $table->string('aerob_ini');
            $table->string('aerob_fim');
            $table->integer('id_cliente')->nullable();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->boolean('status');
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
        Schema::dropIfExists('treinos');
    }
}
