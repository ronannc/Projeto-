<?php

use Illuminate\Database\Seeder;
use App\Models\ExercicioTreino;

class ExercicioTreinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(ExercicioTreino::class, 10)->create();
    }
}
