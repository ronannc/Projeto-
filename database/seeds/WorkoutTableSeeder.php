<?php

use App\Models\Workout;
use Illuminate\Database\Seeder;

class WorkoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Workout::class, 10)->create();
    }
}
