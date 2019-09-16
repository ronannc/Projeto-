<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app('cache')->forget('spatie.permission.cache');

        # Users
        Permission::create(['name' => 'add_users']);
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'list_users']);

        # Roles
        Permission::create(['name' => 'add_roles']);
        Permission::create(['name' => 'edit_roles']);
        Permission::create(['name' => 'list_roles']);

        # Permissions
        Permission::create(['name' => 'add_permissions']);
        Permission::create(['name' => 'edit_permissions']);
        Permission::create(['name' => 'list_permissions']);

        # Companies
        Permission::create(['name' => 'add_companies']);
        Permission::create(['name' => 'edit_companies']);
        Permission::create(['name' => 'list_companies']);

        # Managers
        Permission::create(['name' => 'add_managers']);
        Permission::create(['name' => 'edit_managers']);
        Permission::create(['name' => 'list_managers']);

        # Administrators
        Permission::create(['name' => 'add_administrators']);
        Permission::create(['name' => 'edit_administrators']);
        Permission::create(['name' => 'list_administrators']);

        # Clients
        Permission::create(['name' => 'add_clients']);
        Permission::create(['name' => 'edit_clients']);
        Permission::create(['name' => 'list_clients']);
        Permission::create(['name' => 'view_clients']);

        # Audits
        Permission::create(['name' => 'list_audits']);

        # Notifications
        Permission::create(['name' => 'list_notifications']);

        # Online
        Permission::create(['name' => 'list_online']);

        # Back exercises
        Permission::create(['name' => 'add_back']);
        Permission::create(['name' => 'edit_back']);
        Permission::create(['name' => 'list_back']);

        # Bíceps exercises
        Permission::create(['name' => 'add_biceps']);
        Permission::create(['name' => 'edit_biceps']);
        Permission::create(['name' => 'list_biceps']);

        # Breast exercises
        Permission::create(['name' => 'add_breast']);
        Permission::create(['name' => 'edit_breast']);
        Permission::create(['name' => 'list_breast']);

        # Lower members exercises
        Permission::create(['name' => 'add_lower_member']);
        Permission::create(['name' => 'edit_lower_member']);
        Permission::create(['name' => 'list_lower_member']);

        # Physical assessment exercises
        Permission::create(['name' => 'add_physical_assessment']);
        Permission::create(['name' => 'edit_physical_assessment']);
        Permission::create(['name' => 'list_physical_assessment']);

        # Shoulder exercises
        Permission::create(['name' => 'add_shoulder']);
        Permission::create(['name' => 'edit_shoulder']);
        Permission::create(['name' => 'list_shoulder']);

        # Tríceps exercises
        Permission::create(['name' => 'add_triceps']);
        Permission::create(['name' => 'edit_triceps']);
        Permission::create(['name' => 'list_triceps']);

        # Workout exercises
        Permission::create(['name' => 'add_workout']);
        Permission::create(['name' => 'edit_workout']);
        Permission::create(['name' => 'list_workout']);
    }
}
