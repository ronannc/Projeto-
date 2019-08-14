<?php


namespace App\Services;

use App\Models\BackWorkout;
use App\Repositories\Contracts\BackWorkoutRepository;
use Exception;

class BackWorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(BackWorkoutRepository $repository)
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

    public function update(array $data, BackWorkout $costa_treino)
    {

        try {
            $update = $this->repository->update($costa_treino, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(BackWorkout $costa_treino)
    {
        try {
            $delete = $this->repository->delete($costa_treino);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
