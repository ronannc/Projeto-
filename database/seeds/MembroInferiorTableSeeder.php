<?php

use Illuminate\Database\Seeder;
use App\Models\MembroInferior;

class MembroInferiorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        MembroInferior::create([
            'exercicio' => 'Agachamento',
            'descricao' => 'Agachamento',
        ]);
        MembroInferior::create([
            'exercicio' => 'Leg-Press',
            'descricao' => 'Leg-Press',
        ]);
        MembroInferior::create([
            'exercicio' => 'Extensao de joelho',
            'descricao' => 'Extensao de joelho',
        ]);
        MembroInferior::create([
            'exercicio' => 'Flexao de joelho',
            'descricao' => 'Flexao de joelho',
        ]);
        MembroInferior::create([
            'exercicio' => 'Aducao',
            'descricao' => 'Aducao',
        ]);
        MembroInferior::create([
            'exercicio' => 'Abducao',
            'descricao' => 'Abducao',
        ]);
        MembroInferior::create([
            'exercicio' => 'Gluteo',
            'descricao' => 'Gluteo',
        ]);
        MembroInferior::create([
            'exercicio' => 'Hack',
            'descricao' => 'Hack',
        ]);
        MembroInferior::create([
            'exercicio' => 'Extensao de quadril',
            'descricao' => 'Extensao de quadril',
        ]);
        MembroInferior::create([
            'exercicio' => 'Flexao de quadril',
            'descricao' => 'Flexao de quadril',
        ]);
        MembroInferior::create([
            'exercicio' => 'Panturrilha',
            'descricao' => 'Panturrilha',
        ]);
        MembroInferior::create([
            'exercicio' => 'Stiff',
            'descricao' => 'Stiff',
        ]);
        MembroInferior::create([
            'exercicio' => 'Afundo',
            'descricao' => 'Afundo',
        ]);
        MembroInferior::create([
            'exercicio' => 'Subida no banco',
            'descricao' => 'Subida no banco',
        ]);

    }
}
