<?php

use Illuminate\Database\Seeder;
use App\Models\Ombro;

class OmbroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(Ombro::class, 10)->create();

    }
}
