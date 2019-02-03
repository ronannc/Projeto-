<?php

use Illuminate\Database\Seeder;
use App\Models\MembroInferior;

class MembroInferiorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(MembroInferior::class, 10)->create();

    }
}
