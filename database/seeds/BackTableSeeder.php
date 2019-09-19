<?php

use App\Models\Back;
use Illuminate\Database\Seeder;

class BackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Back::class)->create([
            'exercise'    => 'Puley backs',
            'description' => 'Puley backs',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Puley frente',
            'description' => 'Puley frente',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Remada baixa',
            'description' => 'Remada baixa',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Remada curvada',
            'description' => 'Remada curvada',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Costas peck deck',
            'description' => 'Costas peck deck',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Puxador',
            'description' => 'Puxador',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Remada Cavalinho',
            'description' => 'Remada Cavalinho',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Extensao Tronco',
            'description' => 'Extensao Tronco',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Extensao de braco',
            'description' => 'Extensao de braco',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Puley frente pegada supinada',
            'description' => 'Puley frente pegada supinada',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Remada uni-lateral',
            'description' => 'Remada uni-lateral',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Barra fixa',
            'description' => 'Barra fixa',
        ]);

        factory(Back::class)->create([
            'exercise'    => 'Levantamento terra',
            'description' => 'Levantamento terra',
        ]);
    }
}
