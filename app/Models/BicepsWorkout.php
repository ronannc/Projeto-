<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BicepsWorkout extends Model
{
    protected $fillable = [
        'biceps_id',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
