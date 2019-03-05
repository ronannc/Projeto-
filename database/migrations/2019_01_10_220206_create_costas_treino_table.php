<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostasTreinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costas_treino', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_costa');
            $table->integer('id_treino');
            $table->foreign('id_treino')->references('id')->on('treinos');
            $table->string('kg');
            $table->string('serie');
            $table->string('rep');
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
        Schema::dropIfExists('costas_treino');
    }
}
