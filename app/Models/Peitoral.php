<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peitoral extends Model
{
    protected $table = "peitorais";

    protected $fillable = [
        'exercicio',
        'descricao',
    ];}
