<?php


namespace App\Services;

use App\Models\Client;
use App\Models\Workout;
use App\Repositories\Contracts\WorkoutRepository;
use Exception;

class WorkoutService
{
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(WorkoutRepository $repository)
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

    public function update(array $data, Workout $treino)
    {
        try {
            $update = $this->repository->update($treino, $data);
            return $update;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Workout $treino)
    {
        try {
            $delete = $this->repository->delete($treino);
            return $delete;
        } catch (Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function process_data($data, $formula_treino = false)
    {
        if ($formula_treino) {
            $cliente = Client::find($data['formula_treino']['id_cliente']);
        }
        //tem que receber o peso do client para calcular a carga segundo a formula
        $collect = array();
        foreach ($data as $key => $aux) {
            $aux_key = explode('_', $key);
            if (count($aux_key) == 3) {
                $collect[$aux_key[1]][$aux_key[2]][$aux_key[0]] = $aux;
                if ($formula_treino) {
                    if ($aux_key[0] == "kg") {
                        $rep = $collect[$aux_key[1]][$aux_key[2]]['rep'];
                        $kg = $collect[$aux_key[1]][$aux_key[2]]['kg'];
                        $collect[$aux_key[1]][$aux_key[2]]['kg'] = $this->formula($kg, $rep, $cliente['peso'],
                            $data['formula_treino']['porcentagem']);
                    }
                }
            }
        }

        return $collect;
    }

    public function formula($carga, $repeticceos, $pesoClient, $porcentagem)
    {
        return (((($carga * 100) / abs(102.78 - (2.78 * $repeticceos))) / $pesoClient) * ($porcentagem / 100)) * $pesoClient;
    }

}
