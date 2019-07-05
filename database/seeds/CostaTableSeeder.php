<?php

use Illuminate\Database\Seeder;
use App\Models\Costa;

class CostaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Costa::create([
            'exercicio' => 'Puley costas',
            'descricao' => 'Puley costas',
        ]);
        Costa::create([
            'exercicio' => 'Puley frente',
            'descricao' => 'Puley frente',
        ]);
        Costa::create([
            'exercicio' => 'Remada baixa',
            'descricao' => 'Remada baixa',
        ]);
        Costa::create([
            'exercicio' => 'Remada curvada',
            'descricao' => 'Remada curvada',
        ]);
        Costa::create([
            'exercicio' => 'Costas peck deck',
            'descricao' => 'Costas peck deck',
        ]);
        Costa::create([
            'exercicio' => 'Puxador',
            'descricao' => 'Puxador',
        ]);
        Costa::create([
            'exercicio' => 'Remada Cavalinho',
            'descricao' => 'Remada Cavalinho',
        ]);
        Costa::create([
            'exercicio' => 'Extensao Tronco',
            'descricao' => 'Extensao Tronco',
        ]);
        Costa::create([
            'exercicio' => 'Extensao de braco',
            'descricao' => 'Extensao de braco',
        ]);
        Costa::create([
            'exercicio' => 'Puley frente pegada supinada',
            'descricao' => 'Puley frente pegada supinada',
        ]);
        Costa::create([
            'exercicio' => 'Remada uni-lateral',
            'descricao' => 'Remada uni-lateral',
        ]);
        Costa::create([
            'exercicio' => 'Barra fixa',
            'descricao' => 'Barra fixa',
        ]);
        Costa::create([
            'exercicio' => 'Levantamento terra',
            'descricao' => 'Levantamento terra',
        ]);

    }
}
