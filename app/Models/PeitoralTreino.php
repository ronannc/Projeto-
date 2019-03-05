<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeitoralTreino extends Model
{
    protected $table = "peitorais_treino";

    protected $fillable = [
        'id_peitoral',
        'id_treino',
        'kg',
        'serie',
        'rep'
    ];}
