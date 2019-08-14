<?php

use App\Models\Shoulder;
use Illuminate\Database\Seeder;

class ShouldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Shoulder::create([
            'exercise'    => 'Elevacao lateral',
            'description' => 'Elevacao lateral',
        ]);
        Shoulder::create([
            'exercise'    => 'Elevacao frontal',
            'description' => 'Elevacao frontal',
        ]);
        Shoulder::create([
            'exercise'    => 'Elevacao diagonal',
            'description' => 'Elevacao diagonal',
        ]);
        Shoulder::create([
            'exercise'    => 'Desenvolvimento',
            'description' => 'Desenvolvimento',
        ]);
        Shoulder::create([
            'exercise'    => 'Encolhimento',
            'description' => 'Encolhimento',
        ]);
        Shoulder::create([
            'exercise'    => 'Remada alta',
            'description' => 'Remada alta',
        ]);
        Shoulder::create([
            'exercise'    => 'Crucifixo invertido',
            'description' => 'Crucifixo invertido',
        ]);
        Shoulder::create([
            'exercise'    => 'Rotacao externa',
            'description' => 'Rotacao externa',
        ]);
        Shoulder::create([
            'exercise'    => 'Rotacao interna',
            'description' => 'Rotacao interna',
        ]);

    }
}
