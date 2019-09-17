<?php


namespace App\Services;

use App\Models\TricepsWorkout;
use App\Repositories\Contracts\TricepsWorkoutRepository;
use Exception;

class TricepsWorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(TricepsWorkoutRepository $repository)
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

    public function update(array $data, TricepsWorkout $triceps_workout)
    {
        try {
            $update = $this->repository->update($triceps_workout, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(TricepsWorkout $triceps_workout)
    {
        try {
            $delete = $this->repository->delete($triceps_workout);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
