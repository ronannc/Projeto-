<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowerMemberWorkout extends Model
{
    protected $fillable = [
        'id_lower_members',
        'id_workout',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
