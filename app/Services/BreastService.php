<?php


namespace App\Services;

use App\Models\Peitoral;
use App\Repositories\Contracts\BreastRepository;

class BreastService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(BreastRepository $repository)
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

    public function update(array $data, Peitoral $peitoral)
    {

        try {
            $update = $this->repository->update($peitoral, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Peitoral $peitoral)
    {
        try {
            $delete = $this->repository->delete($peitoral);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
