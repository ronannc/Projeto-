<?php

namespace App\Repositories\Contracts;


interface ClientRepository extends BaseRepository
{
    public function saveConfiguracaoClient(array $data);

    public function updateConfiguracaoClient(array $data);

    public function getExerciciosTreino($id);
}
