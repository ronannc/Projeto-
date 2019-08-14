<?php

use App\Models\LowerMember;
use Illuminate\Database\Seeder;

class LowerMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        LowerMember::create([
            'exercise'    => 'Agachamento',
            'description' => 'Agachamento',
        ]);
        LowerMember::create([
            'exercise'    => 'Leg-Press',
            'description' => 'Leg-Press',
        ]);
        LowerMember::create([
            'exercise'    => 'Extensao de joelho',
            'description' => 'Extensao de joelho',
        ]);
        LowerMember::create([
            'exercise'    => 'Flexao de joelho',
            'description' => 'Flexao de joelho',
        ]);
        LowerMember::create([
            'exercise'    => 'Aducao',
            'description' => 'Aducao',
        ]);
        LowerMember::create([
            'exercise'    => 'Abducao',
            'description' => 'Abducao',
        ]);
        LowerMember::create([
            'exercise'    => 'Gluteo',
            'description' => 'Gluteo',
        ]);
        LowerMember::create([
            'exercise'    => 'Hack',
            'description' => 'Hack',
        ]);
        LowerMember::create([
            'exercise'    => 'Extensao de quadril',
            'description' => 'Extensao de quadril',
        ]);
        LowerMember::create([
            'exercise'    => 'Flexao de quadril',
            'description' => 'Flexao de quadril',
        ]);
        LowerMember::create([
            'exercise'    => 'Panturrilha',
            'description' => 'Panturrilha',
        ]);
        LowerMember::create([
            'exercise'    => 'Stiff',
            'description' => 'Stiff',
        ]);
        LowerMember::create([
            'exercise'    => 'Afundo',
            'description' => 'Afundo',
        ]);
        LowerMember::create([
            'exercise'    => 'Subida no banco',
            'description' => 'Subida no banco',
        ]);

    }
}
