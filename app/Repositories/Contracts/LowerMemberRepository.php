<?php

namespace App\Repositories\Contracts;

interface LowerMemberRepository extends BaseRepository
{
    //
    public function exerciseByClient($client_id);
}
