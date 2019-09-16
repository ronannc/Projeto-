<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\Contracts\RoleRepository;

class EloquentRoleRepository extends AbstractEloquentRepository implements RoleRepository
{
    public function getExtraData($id = null)
    {
        $extraData['permissions'] = Permission::all();

        return $extraData;
    }
}