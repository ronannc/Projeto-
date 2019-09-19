<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ############
        # ADMIN
        ############

        $role = Role::create(['name' => User::ADMIN]);

        $role->givePermissionTo(Permission::all());

        ############
        # MANAGER
        ############

        $role = Role::create(['name' => User::MANAGER]);

        $role->givePermissionTo('add_users');
        $role->givePermissionTo('edit_users');
        $role->givePermissionTo('list_users');

        # Managers
        $role->givePermissionTo('add_managers');
        $role->givePermissionTo('edit_managers');
        $role->givePermissionTo('list_managers');

        # Clients
        $role->givePermissionTo('add_clients');
        $role->givePermissionTo('edit_clients');
        $role->givePermissionTo('list_clients');
        $role->givePermissionTo('view_clients');

        # Back exercises
        $role->givePermissionTo('add_back');
        $role->givePermissionTo('edit_back');
        $role->givePermissionTo('list_back');

        # Bíceps exercises
        $role->givePermissionTo('add_biceps');
        $role->givePermissionTo('edit_biceps');
        $role->givePermissionTo('list_biceps');

        # Breast exercises
        $role->givePermissionTo('add_breast');
        $role->givePermissionTo('edit_breast');
        $role->givePermissionTo('list_breast');

        # Lower members exercises
        $role->givePermissionTo('add_lower_member');
        $role->givePermissionTo('edit_lower_member');
        $role->givePermissionTo('list_lower_member');

        # Physical assessment exercises
        $role->givePermissionTo('add_physical_assessment');
        $role->givePermissionTo('edit_physical_assessment');
        $role->givePermissionTo('list_physical_assessment');

        # Shoulder exercises
        $role->givePermissionTo('add_shoulder');
        $role->givePermissionTo('edit_shoulder');
        $role->givePermissionTo('list_shoulder');

        # Tríceps exercises
        $role->givePermissionTo('add_triceps');
        $role->givePermissionTo('edit_triceps');
        $role->givePermissionTo('list_triceps');

        # Workout exercises
        $role->givePermissionTo('add_workout');
        $role->givePermissionTo('edit_workout');
        $role->givePermissionTo('list_workout');

        # Goals
        $role->givePermissionTo('add_goals');
        $role->givePermissionTo('edit_goals');
        $role->givePermissionTo('list_goals');

        # Companies
        $role->givePermissionTo('edit_companies');

        # Notifications
        $role->givePermissionTo('list_notifications');
    }
}
