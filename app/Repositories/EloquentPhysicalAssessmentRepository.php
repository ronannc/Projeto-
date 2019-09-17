<?php

namespace App\Repositories;


use App\Models\Client;
use App\Repositories\Contracts\PhysicalAssessmentRepository;

class EloquentPhysicalAssessmentRepository extends AbstractEloquentRepository implements PhysicalAssessmentRepository
{
    public function getExtraData()
    {
        $extraData['client'] = Client::all();

        return $extraData;
    }
}
