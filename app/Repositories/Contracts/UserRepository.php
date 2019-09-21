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

    /**
     * Conta quantos usuários acessaram o sistema na última semana.
     *
     * @param $dayOfWeek
     *
     * @return int
     */
    public function getOnlineUsersOnLastWeek($dayOfWeek);
}
