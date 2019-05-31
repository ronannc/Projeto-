<?php


namespace App\Services;

use App\Models\ConfiguracaoCliente;
use App\Repositories\Contracts\ConfiguracaoClienteRepository;

class ConfiguracaoClienteService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(ConfiguracaoClienteRepository $repository)
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

    public function update(array $data, ConfiguracaoCliente $configuracaoCliente)
    {

        try {
            $update = $this->repository->update($configuracaoCliente, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(ConfiguracaoCliente $configuracaoCliente)
    {
        try {
            $delete = $this->repository->delete($configuracaoCliente);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
