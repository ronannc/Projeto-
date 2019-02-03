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

        User::create([
        'name' => 'Ronan',
        'email' => 'ronannc1@yahoo.com.br',
        'password' => bcrypt('secretxxx'),
        ]);
    }
}
