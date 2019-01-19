<?php


namespace App\Services;

use App\Models\Biceps;
use App\Repositories\Contracts\BicepsRepository;

class BicepsService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(BicepsRepository $repository)
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

    public function update(array $data, Biceps $station)
    {

        try {
            $update = $this->repository->update($station, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Biceps $station)
    {
        try {
            $delete = $this->repository->delete($station);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}