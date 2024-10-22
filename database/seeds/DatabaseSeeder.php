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
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
//        $this->call(CompanyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
//        $this->call(WorkoutModeTableSeeder::class);
        $this->call(BicepsTableSeeder::class);
        $this->call(TricepsTableSeeder::class);
        $this->call(ShouldersTableSeeder::class);
        $this->call(BackTableSeeder::class);
        $this->call(BreastsTableSeeder::class);
        $this->call(LowerMembersTableSeeder::class);
//        $this->call(ClientTableSeeder::class);
//        $this->call(GoalTableSeeder::class);
//        $this->call(WorkoutTableSeeder::class);
//        $this->call(PhysicalAssessmentsTableSeeder::class);
    }
}
