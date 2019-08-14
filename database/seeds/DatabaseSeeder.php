<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BicepsTableSeeder::class);
        $this->call(TricepsTableSeeder::class);
        $this->call(ShouldersTableSeeder::class);
        $this->call(BackTableSeeder::class);
        $this->call(BreastsTableSeeder::class);
        $this->call(LowerMembersTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(WorkoutTableSeeder::class);
        $this->call(PhysicalAssessmentsTableSeeder::class);


    }
}
