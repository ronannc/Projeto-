<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreastsWorkout extends Model
{
    protected $fillable = [
        'id_breasts',
        'id_workout',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
