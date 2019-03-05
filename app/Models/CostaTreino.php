<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostaTreino extends Model
{
    protected $table = "costas_treino";

    protected $fillable = [
        'id_costa',
        'id_treino',
        'kg',
        'serie',
        'rep'
    ];
}
