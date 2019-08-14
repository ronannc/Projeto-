<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'name' => 'admin'
        ]);
        Permission::create([
            'id'   => 2,
            'name' => 'cliente'
        ]);
    }
}
