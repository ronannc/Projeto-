<?php


namespace App\Services;

use App\Models\Triceps;
use App\Repositories\Contracts\TricepsRepository;

class TricepsService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(TricepsRepository $repository)
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

    public function update(array $data, Triceps $station)
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

    public function delete(Triceps $station)
    {
        try {
            $update = $this->repository->delete($station);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
