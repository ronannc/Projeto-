<?php


namespace App\Services;

use App\Models\ShoulderWorkout;
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
            $store = $this->repository->store($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, ShoulderWorkout $shoulder_workout)
    {
        try {
            $update = $this->repository->update($shoulder_workout, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(ShoulderWorkout $shoulder_workout)
    {
        try {
            $delete = $this->repository->delete($shoulder_workout);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
