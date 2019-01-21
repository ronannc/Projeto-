<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        \App\Models\User::create([
        'name' => 'Ronan',
        'email' => 'ronannc1@yahoo.com.br',
        'password' => bcrypt('secretxxx'),
        ]);
    }
}
