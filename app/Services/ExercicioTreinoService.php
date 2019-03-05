<?php


namespace App\Services;

use App\Models\ExercicioTreino;
use App\Repositories\Contracts\ExercicioTreinoRepository;

class ExercicioTreinoService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(ExercicioTreinoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->save($data);
            return $store;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, ExercicioTreino $exercicioTreino)
    {
        try {
            $update = $this->repository->update($exercicioTreino, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(ExercicioTreino $exercicioTreino)
    {
        try {
            $delete = $this->repository->delete($exercicioTreino);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
