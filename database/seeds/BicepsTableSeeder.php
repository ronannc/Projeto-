<?php

use App\Models\Biceps;
use Illuminate\Database\Seeder;

class BicepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Biceps::create([
            'exercise' => 'Rosca direta',
            'description' => 'Rosca direta',
        ]);
        Biceps::create([
            'exercise' => 'Rosca alternada',
            'description' => 'Rosca alternada',
        ]);
        Biceps::create([
            'exercise' => 'Rosca simultaneo',
            'description' => 'Rosca simultaneo',
        ]);
        Biceps::create([
            'exercise' => 'Rosca concentrada',
            'description' => 'Rosca concentrada',
        ]);
        Biceps::create([
            'exercise' => 'Rosca invertida',
            'description' => 'Rosca invertida',
        ]);
        Biceps::create([
            'exercise' => 'Rosca na polia',
            'description' => 'Rosca na polia',
        ]);
        Biceps::create([
            'exercise' => 'Rosca martelo',
            'description' => 'Rosca martelo',
        ]);
        Biceps::create([
            'exercise' => 'Extensao punho',
            'description' => 'Extensao punho',
        ]);
        Biceps::create([
            'exercise' => 'Flexao punho',
            'description' => 'Flexao punho',
        ]);
        Biceps::create([
            'exercise' => 'Rosca scoth',
            'description' => 'Rosca scoth',
        ]);
        Biceps::create([
            'exercise' => 'Rosca no banco inclinado',
            'description' => 'Rosca no banco inclinado',
        ]);
        Biceps::create([
            'exercise' => 'Rosca martelo com rotacao',
            'description' => 'Rosca martelo com rotacao',
        ]);
        Biceps::create([
            'exercise' => 'Rosca 21',
            'description' => 'Rosca 21',
        ]);

    }
}
