<?php

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface TreinoRepository
{
    public function save(array $data);

    public function update(Model $model, array $data);

    public function delete(Model $model);

    public function getExtraData();

    public function getExerciciosTreino($id);

    public function save_triceps_treino($data);

    public function update_triceps_treino($data);

    public function save_biceps_treino($data);

    public function update_biceps_treino($data);

    public function save_costa_treino($data);
    public function update_costa_treino($data);

    public function save_ombro_treino($data);
    public function update_ombro_treino($data);

    public function save_peitoral_treino($data);
    public function update_peitoral_treino($data);

    public function save_membro_inferior_treino( $data);
    public function update_membro_inferior_treino( $data);

}
