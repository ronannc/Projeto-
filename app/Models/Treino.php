<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $table = "treinos";

    protected $fillable = [
        'inicio',
        'prox_ficha',
        'descricao',
        'objetivo',
        'intervalo',
        'metodo',
        'frequencia',
        'aerob_ini',
        'aerob_fim',
        'id_cliente'
    ];
}
