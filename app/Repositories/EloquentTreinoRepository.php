<?php

namespace App\Repositories;


use App\Models\Treino;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\TreinoRepository;

class EloquentTreinoRepository extends AbstractEloquentRepository implements TreinoRepository
{

    public function getExtraData($id = null): array
    {
        $extraData['network'] = Treino::getMyNetworks();
        return $extraData;
    }

    public function save(array $data)
    {
        return parent::save($data); // TODO: Change the autogenerated stub
    }

    public function update(Model $model, array $data)
    {
        return parent::update($model, $data); // TODO: Change the autogenerated stub
    }

    public function delete(Model $model)
    {
        if ($this->verifyDelete($model)){
            return parent::delete($model);
        }

        return array('error' => true, 'message' => 'Não é possível excluir esse registro. A base de dados apresenta informações dependentes desse registro.');

    }

    public function verifyDelete(Model $model){

        if (count($model->clients) > 0){
            return false;
        }

        if (count($model->billings) > 0){
            return false;
        }

        if (count($model->consumptions) > 0){
            return false;
        }

        if (count($model->consumptionItems) > 0){
            return false;
        }

        if (count($model->products) > 0){
            return false;
        }

        return true;
    }
}
