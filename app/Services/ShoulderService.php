<?php


namespace App\Services;

use App\Models\Ombro;
use App\Repositories\Contracts\ShoulderRepository;

class ShoulderService
{
    protected $repository;

    /**
     * StationService constructor.
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
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Ombro $ombro)
    {

        try {
            $update = $this->repository->update($ombro, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Ombro $ombro)
    {
        try {
            $delete = $this->repository->delete($ombro);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}