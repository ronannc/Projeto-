<?php


namespace App\Services;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepository;
use Exception;

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
            $store = $this->repository->save($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Client $client)
    {

        try {
            $update = $this->repository->update($client, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Client $client)
    {
        try {
            $delete = $this->repository->delete($client);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function storeConfiguracaoClient(array $data)
    {
        try {
            $store = $this->repository->saveConfiguracaoClient($data);
            return $store;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function updateConfiguracaoClient(array $data)
    {
        try {
            $update = $this->repository->updateConfiguracaoClient($data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

}
