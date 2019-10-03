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

        # Managers
        $role->givePermissionTo('add_managers');
        $role->givePermissionTo('edit_managers');
        $role->givePermissionTo('list_managers');
        $role->givePermissionTo('destroy_managers');

        # Clients
        $role->givePermissionTo('add_clients');
        $role->givePermissionTo('edit_clients');
        $role->givePermissionTo('list_clients');
        $role->givePermissionTo('view_clients');
        $role->givePermissionTo('destroy_clients');

        # Physical assessment
        $role->givePermissionTo('list_physical_assessment');
        $role->givePermissionTo('add_physical_assessment');
        $role->givePermissionTo('edit_physical_assessment');
        $role->givePermissionTo('view_physical_assessment');
        $role->givePermissionTo('destroy_physical_assessment');

        # Workout exercises
        $role->givePermissionTo('list_workout');
        $role->givePermissionTo('add_workout');
        $role->givePermissionTo('edit_workout');
        $role->givePermissionTo('view_workout');
        $role->givePermissionTo('destroy_workout');

        # Back exercises
        $role->givePermissionTo('list_back');

        # Bíceps exercises
        $role->givePermissionTo('list_biceps');

        # Breast exercises
        $role->givePermissionTo('list_breast');

        # Lower members exercises
        $role->givePermissionTo('list_lower_member');

        # Shoulder exercises
        $role->givePermissionTo('list_shoulder');

        # Tríceps exercises
        $role->givePermissionTo('list_triceps');

        # Workout exercises
        $role->givePermissionTo('list_workout_modes');

        # Goals
        $role->givePermissionTo('list_goals');

        # Companies
        $role->givePermissionTo('list_companies');
        $role->givePermissionTo('edit_companies');
        $role->givePermissionTo('view_companies');
    }
}
