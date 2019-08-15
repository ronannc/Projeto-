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
            'description' => 'Modo de treino Treino pirâmide',
        ]);

        WorkoutMode::create([
            'name'        => 'Drop set',
            'description' => 'Modo de treino Drop set',
        ]);

        WorkoutMode::create([
            'name'        => 'Bi-set',
            'description' => 'Modo de treino Bi-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Tri-set',
            'description' => 'Modo de treino Tri-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Super-set',
            'description' => 'Modo de treino Super-set',
        ]);

        WorkoutMode::create([
            'name'        => 'Circuito',
            'description' => 'Modo de treino Circuito',
        ]);

        WorkoutMode::create([
            'name'        => 'Set 21',
            'description' => 'Modo de treino Set 21',
        ]);
    }
}
