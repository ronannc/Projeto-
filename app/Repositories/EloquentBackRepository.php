<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\BackRepository;

class EloquentBackRepository extends AbstractEloquentRepository implements BackRepository
{
    //
    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->back()->get();
    }
}
