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
        factory(Shoulder::class)->create([
            'exercise'    => 'Elevacao lateral',
            'description' => 'Elevacao lateral',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Elevacao frontal',
            'description' => 'Elevacao frontal',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Elevacao diagonal',
            'description' => 'Elevacao diagonal',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Desenvolvimento',
            'description' => 'Desenvolvimento',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Encolhimento',
            'description' => 'Encolhimento',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Remada alta',
            'description' => 'Remada alta',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Crucifixo invertido',
            'description' => 'Crucifixo invertido',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Rotacao externa',
            'description' => 'Rotacao externa',
        ]);

        factory(Shoulder::class)->create([
            'exercise'    => 'Rotacao interna',
            'description' => 'Rotacao interna',
        ]);
    }
}
