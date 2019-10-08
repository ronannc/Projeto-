<?php


namespace App\Services;

use App\Repositories\Contracts\BackRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

class BackService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(BackRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->store($data);
            return $store;
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
