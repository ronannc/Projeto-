<?php


namespace App\Services;

use App\Models\TricepsTreino;
use App\Repositories\Contracts\TricepsTreinoRepository;

class TricepsTreinoService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(TricepsTreinoRepository $repository)
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

    public function update(array $data, TricepsTreino $triceps_treino)
    {

        try {
            $update = $this->repository->update($triceps_treino, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(TricepsTreino $triceps_treino)
    {
        try {
            $delete = $this->repository->delete($triceps_treino);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
