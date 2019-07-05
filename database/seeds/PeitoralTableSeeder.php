<?php

use Illuminate\Database\Seeder;
use App\Models\Peitoral;

class PeitoralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Peitoral::create([
            'exercicio' => 'Supino reto',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Supino inclinado',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Peck deck',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Crucifixo',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Fly 45',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Pullouver',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Cross chest',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Flexao de braco',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Supino com halter',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Supino 45 com halter',
            'descricao' => '',
        ]);
        Peitoral::create([
            'exercicio' => 'Supino declinado',
            'descricao' => '',
        ]);
    }
}
