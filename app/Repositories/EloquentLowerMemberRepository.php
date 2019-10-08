<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\LowerMemberRepository;

class EloquentLowerMemberRepository extends AbstractEloquentRepository implements LowerMemberRepository
{
    //
    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->lowerMember()->get();
    }
}
