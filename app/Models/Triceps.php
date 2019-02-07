<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triceps extends Model
{
    protected $table = "triceps";

    protected $fillable = [
        'exercicio',
        'descricao',
    ];
}
