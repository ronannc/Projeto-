<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $user = User::create([
            'name' => 'Ronan Nunes Campos',
            'email' => 'ronannc1@yahoo.com.br',
            'password' => bcrypt('secretxxx'),
        ]);
//        $user->assignRole(User::ADMIN);

//        $user = User::create([
//            'name' => 'Cliente',
//            'email' => 'cliente@mail.com',
//            'password' => bcrypt('secretxxx'),
//        ]);
//        $user->assignRole(User::CLIENTE);
    }
}
