<?php

namespace App\Repositories\Contracts;


interface BicepsRepository extends BaseRepository
{

    public function exerciseByClient($client_id);
}
