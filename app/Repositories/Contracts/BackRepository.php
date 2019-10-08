<?php

namespace App\Repositories\Contracts;


interface BackRepository extends BaseRepository
{
    //
    public function exerciseByClient($client_id);
}
