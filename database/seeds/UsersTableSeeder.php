<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@email.com',
            'password' => bcrypt('secretxxx'),
        ]);
        $user->assignRole(User::ADMIN);

        $user = User::create([
            'name'     => 'Manager',
            'email'    => 'manager@email.com',
            'password' => bcrypt('secretxxx'),
        ]);
        $user->assignRole(User::MANAGER);
    }
}
