<?php


namespace App\Services;

use App\Models\Treino;
use App\Repositories\Contracts\TreinoRepository;

class TreinoService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(TreinoRepository $repository)
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

    public function update(array $data, Treino $treino)
    {
        try {
            $update = $this->repository->update($treino, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Treino $treino)
    {
        try {
            $delete = $this->repository->delete($treino);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }
}
