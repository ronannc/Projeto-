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
            'name'     => 'SuperAdmin',
            'email'    => 'superadmin@email.com',
            'password' => bcrypt('secretxxx'),
        ]);
        $user->assignRole(User::SUPER_ADMIN);

        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@email.com',
            'password' => bcrypt('secretxxx'),
        ]);
        $user->assignRole(User::ADMIN);
    }
}
