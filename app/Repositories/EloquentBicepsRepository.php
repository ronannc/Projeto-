<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\BicepsRepository;

class EloquentBicepsRepository extends AbstractEloquentRepository implements BicepsRepository
{

    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->biceps()->get();
    }
}
