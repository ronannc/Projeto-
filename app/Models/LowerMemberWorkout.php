<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowerMemberWorkout extends Model
{
    protected $fillable = [
        'lower_member_ids',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
