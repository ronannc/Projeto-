<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shoulder');
            $table->integer('chest');
            $table->integer('right_arm');
            $table->integer('left_arm');
            $table->integer('right_forearm');
            $table->integer('left_forearm');
            $table->integer('waist');
            $table->integer('abdomen');
            $table->integer('hip');
            $table->integer('right_thigh');
            $table->integer('left_thigh');
            $table->integer('right_calf');
            $table->integer('left_calf');
            $table->decimal('height', 3, 2);
            $table->decimal('weight', 6, 3);
            $table->string('blood_pressure');
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
        Schema::dropIfExists('physical_assessments');
    }
}
