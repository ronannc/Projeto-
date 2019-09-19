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
        factory(LowerMember::class)->create([
            'exercise'    => 'Agachamento',
            'description' => 'Agachamento',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Leg-Press',
            'description' => 'Leg-Press',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Extensao de joelho',
            'description' => 'Extensao de joelho',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Flexao de joelho',
            'description' => 'Flexao de joelho',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Aducao',
            'description' => 'Aducao',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Abducao',
            'description' => 'Abducao',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Gluteo',
            'description' => 'Gluteo',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Hack',
            'description' => 'Hack',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Extensao de quadril',
            'description' => 'Extensao de quadril',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Flexao de quadril',
            'description' => 'Flexao de quadril',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Panturrilha',
            'description' => 'Panturrilha',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Stiff',
            'description' => 'Stiff',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Afundo',
            'description' => 'Afundo',
        ]);

        factory(LowerMember::class)->create([
            'exercise'    => 'Subida no banco',
            'description' => 'Subida no banco',
        ]);
    }
}
