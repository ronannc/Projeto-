<?php

namespace App\Repositories\Contracts;


interface ShoulderRepository extends BaseRepository
{
    //
    public function exerciseByClient($client_id);
}
