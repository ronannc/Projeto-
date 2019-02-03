<?php

use Illuminate\Database\Seeder;
use App\Models\Costa;

class CostaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        factory(Costa::class, 10)->create();

    }
}
