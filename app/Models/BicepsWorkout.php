<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BicepsWorkout extends Model
{
    protected $fillable = [
        'biceps_id',
        'workout_id',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
