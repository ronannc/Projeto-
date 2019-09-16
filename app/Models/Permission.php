<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];
}
