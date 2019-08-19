<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('start');
            $table->date('next_workout');
            $table->string('goal');
            $table->string('interval');
            $table->string('frequency');
            $table->integer('method_id')->nullable();
            $table->foreign('method_id')->references('id')->on('methods');
            $table->integer('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('workouts');
    }
}
