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

        Biceps::create([
            'exercicio' => 'Rosca direta',
            'descricao' => 'Rosca direta',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca alternada',
            'descricao' => 'Rosca alternada',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca simultaneo',
            'descricao' => 'Rosca simultaneo',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca concentrada',
            'descricao' => 'Rosca concentrada',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca invertida',
            'descricao' => 'Rosca invertida',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca na polia',
            'descricao' => 'Rosca na polia',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca martelo',
            'descricao' => 'Rosca martelo',
        ]);
        Biceps::create([
            'exercicio' => 'Extensao punho',
            'descricao' => 'Extensao punho',
        ]);
        Biceps::create([
            'exercicio' => 'Flexao punho',
            'descricao' => 'Flexao punho',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca scoth',
            'descricao' => 'Rosca scoth',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca no banco inclinado',
            'descricao' => 'Rosca no banco inclinado',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca martelo com rotacao',
            'descricao' => 'Rosca martelo com rotacao',
        ]);
        Biceps::create([
            'exercicio' => 'Rosca 21',
            'descricao' => 'Rosca 21',
        ]);

    }
}
