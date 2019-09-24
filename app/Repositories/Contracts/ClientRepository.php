<?php

namespace App\Repositories\Contracts;


interface ClientRepository extends BaseRepository
{
    public function getExtraData();

    public function getExerciciosTreino($id);
}
