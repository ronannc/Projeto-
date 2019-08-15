<?php

use App\Models\WorkoutMode;
use Illuminate\Database\Seeder;

class WorkoutModeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkoutMode::create([
            'name'        => 'Treino pirâmide',
            'description' => 'Treino pirâmide',
        ]);

        WorkoutMode::create([
            'name'        => 'Drop set',
            'description' => 'Drop set',
        ]);

        WorkoutMode::create([
            'name'        => 'Bi-set',
            'description' => 'Bi-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Tri-set',
            'description' => 'Tri-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Super-set',
            'description' => 'Super-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Circuito',
            'description' => 'Circuito',
        ]);

        WorkoutMode::create([
            'name'        => 'Set 21',
            'description' => 'Set 21',
        ]);

        WorkoutMode::create([
            'name'        => '',
            'description' => '',
        ]);
    }
}
