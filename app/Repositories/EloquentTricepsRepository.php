<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\TricepsRepository;

class EloquentTricepsRepository extends AbstractEloquentRepository implements TricepsRepository
{
    //
    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->triceps()->get();
    }
}
