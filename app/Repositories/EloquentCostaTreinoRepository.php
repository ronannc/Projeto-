<?php

namespace App\Repositories;


use App\Models\Costa;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\CostaRepository;

class EloquentCostaTreinoRepository extends AbstractEloquentRepository implements CostaRepository
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
