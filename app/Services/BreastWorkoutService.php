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
            $store = $this->repository->store($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, BreastWorkout $breast_workout)
    {

        try {
            $update = $this->repository->update($breast_workout, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(BreastWorkout $breast_workout)
    {
        try {
            $delete = $this->repository->delete($breast_workout);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
