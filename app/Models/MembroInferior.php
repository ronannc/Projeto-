<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembroInferior extends Model
{
    protected $table = "membros_inferiores";


    protected $fillable = [
        'exercicio',
        'descricao',
    ];
}
