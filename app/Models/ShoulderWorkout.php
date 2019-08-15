<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoulderWorkout extends Model
{
    protected $fillable = [
        'shoulder_id',
        'workout_id',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
