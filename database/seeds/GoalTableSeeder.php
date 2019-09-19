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
        Goal::create([
            'name'        => 'Força',
            'description' => 'Treino focado em força muscular',
        ]);

        Goal::create([
            'name'        => 'Hipertrofia',
            'description' => 'Treino focado em hipertrofia muscular',
        ]);

        Goal::create([
            'name'        => 'Resistência',
            'description' => 'Treino focado em resistência muscular',
        ]);

        Goal::create([
            'name'        => 'Emagrecimento',
            'description' => 'Treino focado em perda de gordura',
        ]);

        Goal::create([
            'name'        => 'Qualidade de vida',
            'description' => 'Treino para qualidade de vida',
        ]);

        Goal::create([
            'name'        => 'Potência',
            'description' => 'Treino focado em potência muscular',
        ]);

        Goal::create([
            'name'        => 'Condicionamento Físico',
            'description' => 'Treino focado em condicionamento físico',
        ]);

        Goal::create([
            'name'        => 'Fadiga',
            'description' => 'Treino focado em fadiga',
        ]);

        Goal::create([
            'name'        => 'Oclusão Vascular',
            'description' => 'Treino focado em oclusão vascular',
        ]);
    }
}
