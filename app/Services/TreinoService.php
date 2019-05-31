<?php


namespace App\Services;

use App\Models\Treino;
use App\Repositories\Contracts\TreinoRepository;

class TreinoService
{
    protected $repository;

    /**
     * StationService constructor.
     * @param $repository
     */
    public function __construct(TreinoRepository $repository)
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

    public function update(array $data, Treino $treino)
    {
        try {
            $update = $this->repository->update($treino, $data);
            return $update;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(Treino $treino)
    {
        try {
            $delete = $this->repository->delete($treino);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function process_data($data, $formula_treino = false, $porcentagem = 1){
        //tem que receber o peso do cliente para calcular a carga segundo a formula
        $collect = array();
        foreach ($data as $key => $aux ){
            $aux_key = explode('_', $key);
            if(count($aux_key) == 3) {
                $collect[$aux_key[1]][$aux_key[2]][$aux_key[0]] = $aux;
                if ($formula_treino) {
                    if($aux_key[0] == "kg"){
                        $kg = $collect[$aux_key[1]][$aux_key[2]]['kg'];
                        $collect[$aux_key[1]][$aux_key[2]]['kg'] = $kg * 2;
                    }
                }
            }
        }

        return $collect;
    }

}
