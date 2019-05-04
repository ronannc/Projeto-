<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => User::ADMIN]);
        # Users
        $role->givePermissionTo('admin');


        $role = Role::create(['name' => User::CLIENTE]);
        # Users
        $role->givePermissionTo('cliente');
    }
}
