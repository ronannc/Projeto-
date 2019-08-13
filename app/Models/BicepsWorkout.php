<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BicepsWorkout extends Model
{
    protected $fillable = [
        'id_biceps',
        'id_training',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
