<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ombro extends Model
{
    protected $table = "ombros";

    protected $fillable = [
        'exercicio',
        'descricao',
    ];}
