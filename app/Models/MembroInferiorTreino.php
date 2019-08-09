<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembroInferiorTreino extends Model
{
    protected $table = "membros_inferiores_treino";


    protected $fillable = [
        'id_membro_inferior',
        'id_treino',
        'kg',
        'serie',
        'rep',
        'grupo'
    ];
}
