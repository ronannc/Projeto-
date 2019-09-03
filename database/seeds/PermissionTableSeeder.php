<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        exec('php artisan cache:forget spatie.permission.cache');

        # Users
        Permission::create([
            'id'   => 1,
            'name' => 'list'
        ]);
        Permission::create([
            'id'   => 2,
            'name' => 'create'
        ]);
        Permission::create([
            'id'   => 3,
            'name' => 'edit'
        ]);
        Permission::create([
            'id'   => 4,
            'name' => 'delete'
        ]);

        Role::create([
            'name' => 'Super Administrador'
        ]);
        Role::create([
            'name' => 'Administrador'
        ]);
        Role::create([
            'name' => 'Cliente'
        ]);
    }
}
