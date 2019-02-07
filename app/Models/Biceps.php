<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biceps extends Model
{
    protected $table = "biceps";


    protected $fillable = [
        'exercicio',
        'descricao',
    ];


}
