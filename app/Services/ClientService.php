<?php


namespace App\Services;

use App\Repositories\Contracts\ClientRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\Log;

class ClientService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(ClientRepository $repository)
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

    public function storeConfiguracaoClient(array $data)
    {
        try {
            $store = $this->repository->saveConfiguracaoClient($data);
            return $store;
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function updateConfiguracaoClient(array $data)
    {
        try {
            $update = $this->repository->updateConfiguracaoClient($data);
            return $update;
        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

}
