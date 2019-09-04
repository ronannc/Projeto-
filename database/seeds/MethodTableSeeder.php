<?php

use App\Models\Method;
use Illuminate\Database\Seeder;

class MethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Method::create([
            'name'        => 'Força',
            'description' => 'Treino focado em força muscular',
        ]);

        Method::create([
            'name'        => 'Hipertrofia',
            'description' => 'Treino focado em hipertrofia muscular',
        ]);

        Method::create([
            'name'        => 'Resistência',
            'description' => 'Treino focado em resistência muscular',
        ]);

        Method::create([
            'name'        => 'Emagrecimento',
            'description' => 'Treino focado em perda de gordura',
        ]);

        Method::create([
            'name'        => 'Qualidade de vida',
            'description' => 'Treino para qualidade de vida',
        ]);

        Method::create([
            'name'        => 'Potência',
            'description' => 'Treino focado em potência muscular',
        ]);

        Method::create([
            'name'        => 'Condicionamento Físico',
            'description' => 'Treino focado em condicionamento físico',
        ]);

        Method::create([
            'name'        => 'Fadiga',
            'description' => 'Treino focado em fadiga',
        ]);

        Method::create([
            'name'        => 'Oclusão Vascular',
            'description' => 'Treino focado em oclusão vascular',
        ]);
    }
}
