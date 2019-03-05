<?php


namespace App\Services;

use App\Models\CostaTreino;
use App\Repositories\Contracts\CostaTreinoRepository;

class CostaTreinoService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(CostaTreinoRepository $repository)
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

    public function update(array $data, CostaTreino $costa_treino)
    {

        try {
            $update = $this->repository->update($costa_treino, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(CostaTreino $costa_treino)
    {
        try {
            $delete = $this->repository->delete($costa_treino);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
