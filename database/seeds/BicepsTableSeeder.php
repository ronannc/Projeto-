<?php

use Illuminate\Database\Seeder;
use App\Models\Biceps;

class BicepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(Biceps::class, 10)->create();
    }
}
