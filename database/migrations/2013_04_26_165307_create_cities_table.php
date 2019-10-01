<?php

use App\Models\City;
use App\Models\Region;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        if (app()->environment('testing')) {
            Schema::create('regions', function (Blueprint $table) {
                $table->integer('id', true);
                $table->string('name');
                $table->unsignedInteger('pib');
                $table->unsignedInteger('population');
                $table->timestamps();
            });

            Schema::create('states', function (Blueprint $table) {
                $table->integer('id', true);
                $table->string('initials');
                $table->string('name');
                $table->unsignedInteger('pib_1000');
                $table->unsignedInteger('population');
                $table->timestamps();

                $table->integer('region_id');
                $table->foreign('region_id')->references('id')->on('regions');
            });

            Schema::create('cities', function (Blueprint $table) {
                $table->integer('id', true);
                $table->string('name');
                $table->unsignedInteger('population');
                $table->timestamps();

                $table->integer('state_id');
                $table->foreign('state_id')->references('id')->on('states');
            });

            $region = Region::with([])->create([
                'name'       => 'Sudeste',
                'pib'        => 1000,
                'population' => 10000,
            ]);

            $state = State::with([])->create([
                'initials'   => 'MG',
                'name'       => 'Minas Gerais',
                'pib_1000'   => 400,
                'population' => 4000,
                'region_id'  => $region->id,
            ]);

            City::with([])->create([
                'name'       => 'Formiga',
                'population' => 100,
                'state_id'   => $state->id,
            ]);


//        } else {
//            DB::unprepared(file_get_contents(__DIR__ . '/cities.sql'));
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('state_capitals');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('regions');
    }
}
