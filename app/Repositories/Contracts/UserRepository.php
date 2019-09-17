<?php

namespace App\Repositories\Contracts;


use App\Models\User;

/**
 * Interface UserRepository
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends BaseRepository
{
    public function getExtraData($id = null);

    public function findByEmail(string $email): ?User;
}
