<?php


namespace App\Services;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepository;

class ClienteService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(ClienteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $store = $this->repository->save($data);
            return $store;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function update(array $data, Cliente $cliente)
    {

        try {
            $update = $this->repository->update($cliente, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Cliente $cliente)
    {
        try {
            $delete = $this->repository->delete($cliente);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
