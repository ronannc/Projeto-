<?php

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface WorkoutRepository
{
    public function save(array $data);

    public function update(Model $model, array $data);

    public function delete(Model $model);

    public function getExtraData();

    public function getExerciciosTreino($id);

    public function save_triceps_workout($data);

    public function update_triceps_workout($data);

    public function save_biceps_workout($data);

    public function update_biceps_workout($data);

    public function save_back_workout($data);

    public function update_back_workout($data);

    public function save_shoulder_workout($data);

    public function update_shoulder_workout($data);

    public function save_breast_workout($data);

    public function update_breast_workout($data);

    public function save_lower_member_workout($data);

    public function update_lower_member_workout($data);

}
