<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreastWorkout extends Model
{
    protected $fillable = [
        'breast_ids',
        'workout_id',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
