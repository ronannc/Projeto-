<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    public static function roleHasPermission($permission, $roleId)
    {
        return (new self)->find($roleId)->hasPermissionTo($permission);
    }
}
