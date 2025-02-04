<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\ShoulderRepository;

class EloquentShoulderWorkoutRepository extends AbstractEloquentRepository implements ShoulderRepository
{
    //
    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->shoulder()->get();
    }
}
