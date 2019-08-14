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
    public function run(){

        Back::create([
            'exercise' => 'Puley costas',
            'description' => 'Puley costas',
        ]);
        Back::create([
            'exercise' => 'Puley frente',
            'description' => 'Puley frente',
        ]);
        Back::create([
            'exercise' => 'Remada baixa',
            'description' => 'Remada baixa',
        ]);
        Back::create([
            'exercise' => 'Remada curvada',
            'description' => 'Remada curvada',
        ]);
        Back::create([
            'exercise' => 'Costas peck deck',
            'description' => 'Costas peck deck',
        ]);
        Back::create([
            'exercise' => 'Puxador',
            'description' => 'Puxador',
        ]);
        Back::create([
            'exercise' => 'Remada Cavalinho',
            'description' => 'Remada Cavalinho',
        ]);
        Back::create([
            'exercise' => 'Extensao Tronco',
            'description' => 'Extensao Tronco',
        ]);
        Back::create([
            'exercise' => 'Extensao de braco',
            'description' => 'Extensao de braco',
        ]);
        Back::create([
            'exercise' => 'Puley frente pegada supinada',
            'description' => 'Puley frente pegada supinada',
        ]);
        Back::create([
            'exercise' => 'Remada uni-lateral',
            'description' => 'Remada uni-lateral',
        ]);
        Back::create([
            'exercise' => 'Barra fixa',
            'description' => 'Barra fixa',
        ]);
        Back::create([
            'exercise' => 'Levantamento terra',
            'description' => 'Levantamento terra',
        ]);

    }
}
