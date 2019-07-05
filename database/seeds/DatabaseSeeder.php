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
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BicepsTableSeeder::class);
        $this->call(TricepsTableSeeder::class);
        $this->call(OmbroTableSeeder::class);
        $this->call(CostaTableSeeder::class);
        $this->call(PeitoralTableSeeder::class);
        $this->call(MembroInferiorTableSeeder::class);
//        $this->call(ClienteTableSeeder::class);
//        $this->call(TreinoTableSeeder::class);
//        $this->call(ExercicioTreinoTableSeeder::class);




    }
}
