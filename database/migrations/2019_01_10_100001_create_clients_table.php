<?php

use App\Support\BloodType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->nullable();
            $table->char('sex', 1)->nullable();
            $table->enum('blood_type', BloodType::NAMES)->nullable();
            $table->string('phone');
            $table->date('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('street');
            $table->string('neighborhood')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement')->nullable();
            $table->string('zipcode', 20);
            $table->boolean('is_active')->default(1);
            $table->datetime('last_access')->nullable();

            $table->integer('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('clients');
    }
}
