<?php

namespace App\Repositories\Contracts;


interface TricepsRepository extends BaseRepository
{
    //
    public function exerciseByClient($client_id);
}
