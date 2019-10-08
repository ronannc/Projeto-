<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\BreastRepository;

class EloquentBreastRepository extends AbstractEloquentRepository implements BreastRepository
{
    //
    public function exerciseByClient($client_id)
    {
        $client = Client::find($client_id);
        $workout = $client->lastWorkout();
        return $workout->breast()->get();
    }
}
