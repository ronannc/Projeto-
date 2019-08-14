<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShouldersWorkout extends Model
{
    protected $fillable = [
        'id_shoulder',
        'id_workout',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
