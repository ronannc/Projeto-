<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BicepsTreino extends Model
{
    protected $table = "biceps_treino";


    protected $fillable = [
        'id_biceps',
        'id_treino',
        'kg',
        'serie',
        'rep'
    ];


}
