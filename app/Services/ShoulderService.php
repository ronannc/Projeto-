<?php


namespace App\Services;

use App\Repositories\Contracts\ShoulderRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

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
            return $this->repository->store($data);
        } catch (\Exception $exception) {
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

    public function exerciseByClient($client_id)
    {
        return $this->repository->exerciseByClient($client_id);
    }
}
