<?php

use App\Models\Company;
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
        factory(User::class, 1)->create([
            'name'     => 'Administrator',
            'email'    => 'admin@email.com',
            'password' => bcrypt('secretxxx'),
        ])->each(function (User $user) {
            $user->assignRole(User::ADMIN);
        });

        factory(User::class, 1)->create([
            'name'     => 'Manager',
            'email'    => 'manager@email.com',
            'password' => bcrypt('secretxxx'),
            'company_id'   => Company::with([])->inRandomOrder()->first()->id,

        ])->each(function (User $user) {
            $user->assignRole(User::MANAGER);
        });
    }
}
