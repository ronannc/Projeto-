<?php

use App\Models\User;
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

        Permission::create(['name' => 'list_biceps']);
        Permission::create(['name' => 'create_biceps']);

        Permission::create(['name' => 'list_triceps']);
        Permission::create(['name' => 'create_triceps']);

        Permission::create(['name' => 'list_back']);
        Permission::create(['name' => 'create_back']);

        Permission::create(['name' => 'list_shoulder']);
        Permission::create(['name' => 'create_shoulder']);

        Permission::create(['name' => 'list_breast']);
        Permission::create(['name' => 'create_breast']);

        Permission::create(['name' => 'list_lower_member']);
        Permission::create(['name' => 'create_lower_member']);

        Permission::create(['name' => 'list_clients']);
        Permission::create(['name' => 'create_clients']);

        Permission::create(['name' => 'list_physical_assessment']);
        Permission::create(['name' => 'create_physical_assessment']);

        Permission::create(['name' => 'list_company']);
        Permission::create(['name' => 'create_company']);

        Permission::create(['name' => 'list_workout']);
        Permission::create(['name' => 'create_workout']);

        Permission::create(['name' => 'list_workout_mode']);
        Permission::create(['name' => 'create_workout_mode']);

        Permission::create(['name' => 'list_user']);
        Permission::create(['name' => 'create_user']);

        $role = Role::create(['name' => User::SUPER_ADMIN]);
        $role->givePermissionTo('list_biceps');
        $role->givePermissionTo('create_biceps');
        $role->givePermissionTo('list_triceps');
        $role->givePermissionTo('create_triceps');
        $role->givePermissionTo('list_back');
        $role->givePermissionTo('create_back');
        $role->givePermissionTo('list_shoulder');
        $role->givePermissionTo('create_shoulder');
        $role->givePermissionTo('list_breast');
        $role->givePermissionTo('create_breast');
        $role->givePermissionTo('list_lower_member');
        $role->givePermissionTo('create_lower_member');
        $role->givePermissionTo('list_clients');
        $role->givePermissionTo('create_clients');
        $role->givePermissionTo('list_physical_assessment');
        $role->givePermissionTo('create_physical_assessment');
        $role->givePermissionTo('list_company');
        $role->givePermissionTo('create_company');
        $role->givePermissionTo('list_workout');
        $role->givePermissionTo('create_workout');
        $role->givePermissionTo('list_workout_mode');
        $role->givePermissionTo('create_workout_mode');
        $role->givePermissionTo('list_user');
        $role->givePermissionTo('create_user');

        $role = Role::create(['name' => User::ADMIN]);
        $role->givePermissionTo('list_biceps');
        $role->givePermissionTo('create_biceps');
        $role->givePermissionTo('list_triceps');
        $role->givePermissionTo('create_triceps');
        $role->givePermissionTo('list_back');
        $role->givePermissionTo('create_back');
        $role->givePermissionTo('list_shoulder');
        $role->givePermissionTo('create_shoulder');
        $role->givePermissionTo('list_breast');
        $role->givePermissionTo('create_breast');
        $role->givePermissionTo('list_lower_member');
        $role->givePermissionTo('create_lower_member');
        $role->givePermissionTo('list_clients');
        $role->givePermissionTo('create_clients');
        $role->givePermissionTo('list_physical_assessment');
        $role->givePermissionTo('create_physical_assessment');
        $role->givePermissionTo('list_company');
        $role->givePermissionTo('create_company');
        $role->givePermissionTo('list_workout');
        $role->givePermissionTo('create_workout');
        $role->givePermissionTo('list_workout_mode');
        $role->givePermissionTo('create_workout_mode');
        $role->givePermissionTo('list_user');
        $role->givePermissionTo('create_user');

        Role::create(['name' => User::CLIENT]);
    }
}
