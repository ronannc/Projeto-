<?php

use App\Models\PhysicalAssessment;
use Illuminate\Database\Seeder;

class PhysicalAssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(PhysicalAssessment::class, 10)->create();
    }
}
