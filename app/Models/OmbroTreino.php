<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OmbroTreino extends Model
{
    protected $table = "ombros_treino";

    protected $fillable = [
        'id_ombro',
        'id_treino',
        'kg',
        'serie',
        'rep',
        'grupo'
    ];}
