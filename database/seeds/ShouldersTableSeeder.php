<?php

use App\Models\Shoulders;
use Illuminate\Database\Seeder;

class ShouldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        Shoulders::create([
            'exercise' => 'Elevacao lateral',
            'description' => 'Elevacao lateral',
        ]);
        Shoulders::create([
            'exercise' => 'Elevacao frontal',
            'description' => 'Elevacao frontal',
        ]);
        Shoulders::create([
            'exercise' => 'Elevacao diagonal',
            'description' => 'Elevacao diagonal',
        ]);
        Shoulders::create([
            'exercise' => 'Desenvolvimento',
            'description' => 'Desenvolvimento',
        ]);
        Shoulders::create([
            'exercise' => 'Encolhimento',
            'description' => 'Encolhimento',
        ]);
        Shoulders::create([
            'exercise' => 'Remada alta',
            'description' => 'Remada alta',
        ]);
        Shoulders::create([
            'exercise' => 'Crucifixo invertido',
            'description' => 'Crucifixo invertido',
        ]);
        Shoulders::create([
            'exercise' => 'Rotacao externa',
            'description' => 'Rotacao externa',
        ]);
        Shoulders::create([
            'exercise' => 'Rotacao interna',
            'description' => 'Rotacao interna',
        ]);

    }
}
