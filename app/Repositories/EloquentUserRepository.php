<?php

namespace App\Repositories;


use App\Models\Client;
use App\Models\Company;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    public function getExtraData()
    {
        return [
            'client' => Client::all(),
            'company' => Company::all()
        ];
    }

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
