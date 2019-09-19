<?php

use App\Models\Goal;
use Illuminate\Database\Seeder;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Goal::class)->create([
            'name'        => 'Força',
            'description' => 'Treino focado em força muscular',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Hipertrofia',
            'description' => 'Treino focado em hipertrofia muscular',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Resistência',
            'description' => 'Treino focado em resistência muscular',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Emagrecimento',
            'description' => 'Treino focado em perda de gordura',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Qualidade de vida',
            'description' => 'Treino para qualidade de vida',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Potência',
            'description' => 'Treino focado em potência muscular',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Condicionamento Físico',
            'description' => 'Treino focado em condicionamento físico',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Fadiga',
            'description' => 'Treino focado em fadiga',
        ]);

        factory(Goal::class)->create([
            'name'        => 'Oclusão Vascular',
            'description' => 'Treino focado em oclusão vascular',
        ]);
    }
}
