<?php

namespace App\Repositories\Contracts;

interface RoleRepository extends BaseRepository
{
    public function getExtraData($id = null);
}