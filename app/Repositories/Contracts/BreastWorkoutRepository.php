<?php

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface BreastWorkoutRepository
{
    public function save(array $data);

    public function update(Model $model, array $data);

    public function delete(Model $model);
}
