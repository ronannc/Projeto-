<?php

use Illuminate\Database\Seeder;
use App\Models\Breasts;

class BreastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Breasts::create([
            'exercise' => 'Supino reto',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Supino inclinado',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Peck deck',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Crucifixo',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Fly 45',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Pullouver',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Cross chest',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Flexao de braco',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Supino com halter',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Supino 45 com halter',
            'description' => '',
        ]);
        Breasts::create([
            'exercise' => 'Supino declinado',
            'description' => '',
        ]);
    }
}
