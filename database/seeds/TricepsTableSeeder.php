<?php

use Illuminate\Database\Seeder;
use App\Models\Triceps;

class TricepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Triceps::create([
            'exercicio' => 'Puley triceps',
            'descricao' => 'Puley triceps',
        ]);
        Triceps::create([
            'exercicio' => 'Puley invertido',
            'descricao' => 'Puley invertido',
        ]);
        Triceps::create([
            'exercicio' => 'Frances',
            'descricao' => 'Frances',
        ]);
        Triceps::create([
            'exercicio' => 'Frances isolado',
            'descricao' => 'Frances isolado',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps banco',
            'descricao' => 'Triceps banco',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps testa',
            'descricao' => 'Triceps testa',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps supino',
            'descricao' => 'Triceps supino',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps up',
            'descricao' => 'Triceps up',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps corda',
            'descricao' => 'Triceps corda',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps cross isolado',
            'descricao' => 'Triceps cross isolad',
        ]);
        Triceps::create([
            'exercicio' => 'Triceps coice',
            'descricao' => 'Triceps coice',
        ]);

    }
}
