<?php


namespace App\Services;

use App\Models\Triceps;
use App\Repositories\Contracts\TricepsRepository;
use Exception;

class TricepsService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(TricepsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->store($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Triceps $triceps)
    {
        try {
            $update = $this->repository->update($triceps, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Triceps $triceps)
    {
        try {
            $delete = $this->repository->delete($triceps);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
