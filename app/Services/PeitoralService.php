<?php


namespace App\Services;

use App\Models\Peitoral;
use App\Repositories\Contracts\PeitoralRepository;

class PeitoralService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(PeitoralRepository $repository)
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

    public function update(array $data, Peitoral $station)
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

    public function delete(Peitoral $station)
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
