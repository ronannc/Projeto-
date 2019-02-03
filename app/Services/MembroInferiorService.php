<?php


namespace App\Services;

use App\Models\MembroInferior;
use App\Repositories\Contracts\MembroInferiorRepository;

class MembroInferiorService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(MembroInferiorRepository $repository)
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

    public function update(array $data, MembroInferior $membroInferior)
    {

        try {
            $update = $this->repository->update($membroInferior, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(MembroInferior $membroInferior)
    {
        try {
            $delete = $this->repository->delete($membroInferior);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
