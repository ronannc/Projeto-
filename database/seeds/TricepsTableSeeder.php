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
            'exercise' => 'Puley triceps',
            'description' => 'Puley triceps',
        ]);
        Triceps::create([
            'exercise' => 'Puley invertido',
            'description' => 'Puley invertido',
        ]);
        Triceps::create([
            'exercise' => 'Frances',
            'description' => 'Frances',
        ]);
        Triceps::create([
            'exercise' => 'Frances isolado',
            'description' => 'Frances isolado',
        ]);
        Triceps::create([
            'exercise' => 'Triceps banco',
            'description' => 'Triceps banco',
        ]);
        Triceps::create([
            'exercise' => 'Triceps testa',
            'description' => 'Triceps testa',
        ]);
        Triceps::create([
            'exercise' => 'Triceps supino',
            'description' => 'Triceps supino',
        ]);
        Triceps::create([
            'exercise' => 'Triceps up',
            'description' => 'Triceps up',
        ]);
        Triceps::create([
            'exercise' => 'Triceps corda',
            'description' => 'Triceps corda',
        ]);
        Triceps::create([
            'exercise' => 'Triceps cross isolado',
            'description' => 'Triceps cross isolad',
        ]);
        Triceps::create([
            'exercise' => 'Triceps coice',
            'description' => 'Triceps coice',
        ]);

    }
}
