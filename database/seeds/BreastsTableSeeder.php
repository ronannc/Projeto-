<?php

use App\Models\Breast;
use Illuminate\Database\Seeder;

class BreastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Breast::class)->create([
            'exercise'    => 'Supino reto',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Supino inclinado',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Peck deck',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Crucifixo',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Fly 45',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Pullouver',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Cross chest',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Flexao de braco',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Supino com halter',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Supino 45 com halter',
            'description' => '',
        ]);

        factory(Breast::class)->create([
            'exercise'    => 'Supino declinado',
            'description' => '',
        ]);
    }
}
