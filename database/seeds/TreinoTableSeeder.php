<?php

use Illuminate\Database\Seeder;
use App\Models\Treino;

class TreinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(Treino::class, 10)->create();
    }
}
