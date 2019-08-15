<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TricepsWorkout extends Model
{
    protected $fillable = [
        'triceps_id',
        'workout_id',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
