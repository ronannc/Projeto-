<?php


namespace App\Services;

use App\Models\OmbroTreino;
use App\Repositories\Contracts\ShoulderWorkoutRepository;
use Exception;

class ShoulderWorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(ShoulderWorkoutRepository $repository)
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

    public function update(array $data, OmbroTreino $ombro_treino)
    {

        try {
            $update = $this->repository->update($ombro_treino, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(OmbroTreino $ombro_treino)
    {
        try {
            $delete = $this->repository->delete($ombro_treino);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
