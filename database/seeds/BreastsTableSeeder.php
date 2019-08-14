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

        Breast::create([
            'exercise'    => 'Supino reto',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Supino inclinado',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Peck deck',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Crucifixo',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Fly 45',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Pullouver',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Cross chest',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Flexao de braco',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Supino com halter',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Supino 45 com halter',
            'description' => '',
        ]);
        Breast::create([
            'exercise'    => 'Supino declinado',
            'description' => '',
        ]);
    }
}
