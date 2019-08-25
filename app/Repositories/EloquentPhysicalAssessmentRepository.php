<?php

namespace App\Repositories;


use App\Repositories\Contracts\PhysicalAssessmentRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentPhysicalAssessmentRepository extends AbstractEloquentRepository implements PhysicalAssessmentRepository
{

    public function save(array $data)
    {
        return parent::save($data); // TODO: Change the autogenerated stub
    }

    public function update(Model $model, array $data)
    {
        return parent::update($model, $data); // TODO: Change the autogenerated stub
    }

    public function delete(Model $model)
    {
        return parent::delete($model);
    }
}
