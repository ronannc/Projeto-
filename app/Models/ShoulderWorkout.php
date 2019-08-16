<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoulderWorkout extends Model
{
    protected $fillable = [
        'shoulder_id',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
