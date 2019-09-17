<?php

namespace App\Repositories;


use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Spatie\Permission\Models\Role;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    public function getExtraData($id = null)
    {
        $extraData = [
            'client'  => Client::all(),
            'company' => Company::all(),
            'role'    => Role::all(),
        ];

        if (!empty($id)) {
            $extraData['permissions'] = Role::findByName(User::MANAGER)->permissions()->get();
            $extraData['permissionsViaRoles'] = User::getUserRolePermissions($id);
            $extraData['directPermissions'] = User::getUserDirectPermissions($id);
        }

        return $extraData;
    }

    public function findByEmail(string $email): ?User
    {
        return User::with([])
            ->where('email', '=', $email)
            ->first();
    }
}
