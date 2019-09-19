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
    public function run()
    {
        factory(Biceps::class)->create([
            'exercise'    => 'Rosca direta',
            'description' => 'Rosca direta',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca alternada',
            'description' => 'Rosca alternada',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca simultaneo',
            'description' => 'Rosca simultaneo',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca concentrada',
            'description' => 'Rosca concentrada',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca invertida',
            'description' => 'Rosca invertida',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca na polia',
            'description' => 'Rosca na polia',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca martelo',
            'description' => 'Rosca martelo',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Extensao punho',
            'description' => 'Extensao punho',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Flexao punho',
            'description' => 'Flexao punho',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca scoth',
            'description' => 'Rosca scoth',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca no banco inclinado',
            'description' => 'Rosca no banco inclinado',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca martelo com rotacao',
            'description' => 'Rosca martelo com rotacao',
        ]);

        factory(Biceps::class)->create([
            'exercise'    => 'Rosca 21',
            'description' => 'Rosca 21',
        ]);
    }
}
