<?php


namespace App\Services;

use App\Models\Shoulder;
use App\Repositories\Contracts\ShoulderRepository;
use Exception;

class ShoulderService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(ShoulderRepository $repository)
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

    public function update(array $data, Shoulder $shoulder)
    {
        try {
            $update = $this->repository->update($shoulder, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Shoulder $shoulder)
    {
        try {
            $delete = $this->repository->delete($shoulder);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
