<?php

namespace App\Repositories;

use App\Models\BicepsTreino;
use App\Models\ConfiguracaoCliente;
use App\Models\CostaTreino;
use App\Models\MembroInferiorTreino;
use App\Models\OmbroTreino;
use App\Models\PeitoralTreino;
use App\Models\Treino;
use App\Models\TricepsTreino;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\ClienteRepository;

class EloquentClienteRepository extends AbstractEloquentRepository implements ClienteRepository
{

    public function save(array $data)
    {
        return parent::save($data); // TODO: Change the autogenerated stub
    }

    public function saveConfiguracaoCliente(array $data)
    {
        ConfiguracaoCliente::create($data); // TODO: Change the autogenerated stub
    }

    public function updateConfiguracaoCliente(array $data){

        $configuracao = ConfiguracaoCliente::where('id_cliente', $data['id_cliente'])->first();
        if($configuracao){

            return $configuracao->update(['formula' => $data['formula'], 'porcentagem' => $data['porcentagem']]);
        }else{

            ConfiguracaoCliente::create($data); // TODO: Change the autogenerated stub
        }
    }

    public function update(Model $model, array $data)
    {
        return parent::update($model, $data); // TODO: Change the autogenerated stub
    }

    public function delete(Model $model)
    {
        return parent::delete($model);
    }

    public function getExerciciosTreino($id)
    {
        $data = Treino::find($id);
        $data['triceps_treino'] = TricepsTreino::where('id_treino', $id)->get();
        $data['biceps_treino'] = BicepsTreino::where('id_treino', $id)->get();
        $data['costa_treino'] = CostaTreino::where('id_treino', $id)->get();
        $data['ombro_treino'] = OmbroTreino::where('id_treino', $id)->get();
        $data['peitoral_treino'] = PeitoralTreino::where('id_treino', $id)->get();
        $data['membro_inferior_treino'] = MembroInferiorTreino::where('id_treino', $id)->get();
        return $data;
    }
}
