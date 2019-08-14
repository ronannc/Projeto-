<?php


namespace App\Services;

use App\Repositories\Contracts\BicepsRepository;
use Exception;

class BicepsService
{
    protected $repository;

    /**
     * StationService constructor.
     *
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
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, $biceps)
    {

        try {
            $update = $this->repository->update($biceps, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete($biceps)
    {
        try {
            $delete = $this->repository->delete($biceps);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
