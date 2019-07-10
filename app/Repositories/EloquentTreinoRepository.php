<?php

namespace App\Repositories;


use App\Models\Biceps;
use App\Models\BicepsTreino;
use App\Models\Cliente;
use App\Models\Costa;
use App\Models\CostaTreino;
use App\Models\MembroInferior;
use App\Models\MembroInferiorTreino;
use App\Models\Ombro;
use App\Models\OmbroTreino;
use App\Models\Peitoral;
use App\Models\PeitoralTreino;
use App\Models\Treino;
use App\Models\Triceps;
use App\Models\TricepsTreino;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\TreinoRepository;

class EloquentTreinoRepository extends AbstractEloquentRepository implements TreinoRepository
{

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
        return parent::delete($model);
    }

    public function getExerciciosTreino($id)
    {
        $data = Treino::find($id);
        $data['triceps_treino'] = TricepsTreino::where('id_treino', $data['id'])->get();
        $data['biceps_treino'] = BicepsTreino::where('id_treino', $data['id'])->get();
        $data['costa_treino'] = CostaTreino::where('id_treino', $data['id'])->get();
        $data['ombro_treino'] = OmbroTreino::where('id_treino', $data['id'])->get();
        $data['peitoral_treino'] = PeitoralTreino::where('id_treino', $data['id'])->get();
        $data['membro_inferior_treino'] = MembroInferiorTreino::where('id_treino', $data['id'])->get();
        return $data;
    }

    public function getExtraData()
    {
        return [
            'cliente' => Cliente::all(),
            'biceps' => Biceps::all(),
            'triceps' => Triceps::all(),
            'costa' => Costa::all(),
            'peitoral' => Peitoral::all(),
            'ombro' => Ombro::all(),
            'membro_inferior' => MembroInferior::all()
        ];
    }

    public function save_triceps_treino($data)
    {
        TricepsTreino::create([
            'id_treino' => $data['id_treino'],
            'id_triceps' => $data['id_triceps']
        ]);
    }

    public function update_triceps_treino($data)
    {
        TricepsTreino::
            where('id_treino' , $data['id_treino'])
            ->where('id_triceps', $data['id_triceps'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }

    public function save_biceps_treino($data)
    {
        BicepsTreino::create([
            'id_treino' => $data['id_treino'],
            'id_biceps' => $data['id_biceps']
        ]);
    }

    public function update_biceps_treino($data)
    {
        BicepsTreino::
        where('id_treino' , $data['id_treino'])
            ->where('id_biceps', $data['id_biceps'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }

    public function save_costa_treino($data)
    {
        CostaTreino::create([
            'id_treino' => $data['id_treino'],
            'id_costa' => $data['id_costa']
        ]);
    }

    public function update_costa_treino($data)
    {
        CostaTreino::
        where('id_treino' , $data['id_treino'])
            ->where('id_costa', $data['id_costa'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }

    public function save_peitoral_treino($data)
    {
        PeitoralTreino::create([
            'id_treino' => $data['id_treino'],
            'id_peitoral' => $data['id_peitoral']
        ]);
    }

    public function update_peitoral_treino($data)
    {
        PeitoralTreino::
        where('id_treino' , $data['id_treino'])
            ->where('id_peitoral', $data['id_peitoral'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }

    public function save_ombro_treino($data)
    {
        OmbroTreino::create([
            'id_treino' => $data['id_treino'],
            'id_ombro' => $data['id_ombro']
        ]);
    }

    public function update_ombro_treino($data)
    {
        OmbroTreino::
        where('id_treino' , $data['id_treino'])
            ->where('id_ombro', $data['id_ombro'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }

    public function save_membro_inferior_treino($data)
    {
        MembroInferiorTreino::create([
            'id_treino' => $data['id_treino'],
            'id_membro_inferior' => $data['id_membro_inferior']
        ]);
    }

    public function update_membro_inferior_treino($data)
    {
        MembroInferiorTreino::
        where('id_treino' , $data['id_treino'])
            ->where('id_membro_inferior', $data['id_membro_inferior'])
            ->update([
                'kg' => $data['kg'],
                'serie' => $data['serie'],
                'rep' => $data['rep'],
                'grupo' => $data['grupo']
            ]);
    }



}
