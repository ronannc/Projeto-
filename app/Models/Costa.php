<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costa extends Model
{
    protected $table = "costas";

    protected $fillable = [
        'exercicio',
        'descricao',
    ];
}
