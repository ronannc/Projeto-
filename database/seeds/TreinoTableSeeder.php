<?php

use App\Models\Treino;
use Illuminate\Database\Seeder;

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
