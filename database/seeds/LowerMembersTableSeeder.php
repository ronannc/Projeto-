<?php

use Illuminate\Database\Seeder;
use App\Models\LowerMembers;

class LowerMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        LowerMembers::create([
            'exercise' => 'Agachamento',
            'description' => 'Agachamento',
        ]);
        LowerMembers::create([
            'exercise' => 'Leg-Press',
            'description' => 'Leg-Press',
        ]);
        LowerMembers::create([
            'exercise' => 'Extensao de joelho',
            'description' => 'Extensao de joelho',
        ]);
        LowerMembers::create([
            'exercise' => 'Flexao de joelho',
            'description' => 'Flexao de joelho',
        ]);
        LowerMembers::create([
            'exercise' => 'Aducao',
            'description' => 'Aducao',
        ]);
        LowerMembers::create([
            'exercise' => 'Abducao',
            'description' => 'Abducao',
        ]);
        LowerMembers::create([
            'exercise' => 'Gluteo',
            'description' => 'Gluteo',
        ]);
        LowerMembers::create([
            'exercise' => 'Hack',
            'description' => 'Hack',
        ]);
        LowerMembers::create([
            'exercise' => 'Extensao de quadril',
            'description' => 'Extensao de quadril',
        ]);
        LowerMembers::create([
            'exercise' => 'Flexao de quadril',
            'description' => 'Flexao de quadril',
        ]);
        LowerMembers::create([
            'exercise' => 'Panturrilha',
            'description' => 'Panturrilha',
        ]);
        LowerMembers::create([
            'exercise' => 'Stiff',
            'description' => 'Stiff',
        ]);
        LowerMembers::create([
            'exercise' => 'Afundo',
            'description' => 'Afundo',
        ]);
        LowerMembers::create([
            'exercise' => 'Subida no banco',
            'description' => 'Subida no banco',
        ]);

    }
}
