<?php


namespace App\Services;

use App\Models\WorkoutMode;
use App\Repositories\Contracts\WorkoutModeRepository;
use Exception;

class WorkoutModeService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(WorkoutModeRepository $repository)
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

    public function update(array $data, WorkoutMode $back)
    {

        try {
            $update = $this->repository->update($back, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(WorkoutMode $back)
    {
        try {
            $delete = $this->repository->delete($back);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
