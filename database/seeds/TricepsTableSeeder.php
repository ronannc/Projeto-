<?php

use App\Models\Triceps;
use Illuminate\Database\Seeder;

class TricepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Triceps::class)->create([
            'exercise'    => 'Puley triceps',
            'description' => 'Puley triceps',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Puley invertido',
            'description' => 'Puley invertido',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Frances',
            'description' => 'Frances',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Frances isolado',
            'description' => 'Frances isolado',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps banco',
            'description' => 'Triceps banco',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps testa',
            'description' => 'Triceps testa',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps supino',
            'description' => 'Triceps supino',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps up',
            'description' => 'Triceps up',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps corda',
            'description' => 'Triceps corda',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps cross isolado',
            'description' => 'Triceps cross isolad',
        ]);

        factory(Triceps::class)->create([
            'exercise'    => 'Triceps coice',
            'description' => 'Triceps coice',
        ]);
    }
}
