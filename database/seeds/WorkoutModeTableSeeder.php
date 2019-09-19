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
        factory(WorkoutMode::class)->create([
            'name'        => 'Treino pirâmide',
            'description' => 'Modo de treino Treino pirâmide',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Drop set',
            'description' => 'Modo de treino Drop set',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Bi-set',
            'description' => 'Modo de treino Bi-set',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Tri-set',
            'description' => 'Modo de treino Tri-set',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Super-set',
            'description' => 'Modo de treino Super-set',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Circuito',
            'description' => 'Modo de treino Circuito',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Set 21',
            'description' => 'Modo de treino Set 21',
        ]);

        factory(WorkoutMode::class)->create([
            'name'        => 'Multiplas Series',
            'description' => 'Modo de treino Multiplas Series',
        ]);
    }
}
