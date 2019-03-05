<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TricepsTreino extends Model
{
    protected $table = "triceps_treino";

    protected $fillable = [
        'id_triceps',
        'id_treino',
        'kg',
        'serie',
        'rep'
    ];
}
