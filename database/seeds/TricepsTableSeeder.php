<?php

use Illuminate\Database\Seeder;
use App\Models\Triceps;

class TricepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(Triceps::class, 10)->create();

    }
}
