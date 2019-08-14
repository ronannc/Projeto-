<?php


namespace App\Services;

use App\Models\BreastWorkout;
use App\Repositories\Contracts\BreastWorkoutRepository;
use Exception;

class BreastWorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(BreastWorkoutRepository $repository)
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

    public function update(array $data, BreastWorkout $peitoral_treino)
    {

        try {
            $update = $this->repository->update($peitoral_treino, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(BreastWorkout $peitoral_treino)
    {
        try {
            $delete = $this->repository->delete($peitoral_treino);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
