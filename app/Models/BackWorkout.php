<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BackWorkout extends Model
{
    protected $fillable = [
        'id_back',
        'id_training',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
