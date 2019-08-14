<?php

use App\Models\ExercicioTreino;
use Illuminate\Database\Seeder;

class ExercicioTreinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(ExercicioTreino::class, 10)->create();
    }
}
