<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreastWorkout extends Model
{
    protected $fillable = [
        'breast_id',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
