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
            $store = $this->repository->save($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Shoulder $ombro)
    {

        try {
            $update = $this->repository->update($ombro, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Shoulder $ombro)
    {
        try {
            $delete = $this->repository->delete($ombro);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
