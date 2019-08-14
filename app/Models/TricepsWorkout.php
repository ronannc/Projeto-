<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TricepsWorkout extends Model
{
    protected $fillable = [
        'id_triceps',
        'id_workout',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
