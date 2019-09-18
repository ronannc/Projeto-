<?php


namespace App\Services;

use App\Repositories\Contracts\BackWorkoutRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

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
            return $this->repository->store($data);
        } catch (Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function update(array $data, $id)
    {
        $model = $this->repository->findOneById($id);

        try {
            return $this->repository->update($model, $data);
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function destroy($id)
    {
        $model = $this->repository->findOneById($id);

        try {
            return $model->delete();
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }


}
