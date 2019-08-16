<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BackWorkout extends Model
{
    protected $fillable = [
        'back_id',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
