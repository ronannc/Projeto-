<?php

use Illuminate\Database\Seeder;
use App\Models\Ombro;

class OmbroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Ombro::create([
            'exercicio' => 'Elevacao lateral',
            'descricao' => 'Elevacao lateral',
        ]);
        Ombro::create([
            'exercicio' => 'Elevacao frontal',
            'descricao' => 'Elevacao frontal',
        ]);
        Ombro::create([
            'exercicio' => 'Elevacao diagonal',
            'descricao' => 'Elevacao diagonal',
        ]);
        Ombro::create([
            'exercicio' => 'Desenvolvimento',
            'descricao' => 'Desenvolvimento',
        ]);
        Ombro::create([
            'exercicio' => 'Encolhimento',
            'descricao' => 'Encolhimento',
        ]);
        Ombro::create([
            'exercicio' => 'Remada alta',
            'descricao' => 'Remada alta',
        ]);
        Ombro::create([
            'exercicio' => 'Crucifixo invertido',
            'descricao' => 'Crucifixo invertido',
        ]);
        Ombro::create([
            'exercicio' => 'Rotacao externa',
            'descricao' => 'Rotacao externa',
        ]);
        Ombro::create([
            'exercicio' => 'Rotacao interna',
            'descricao' => 'Rotacao interna',
        ]);

    }
}
