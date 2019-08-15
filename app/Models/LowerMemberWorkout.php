<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowerMemberWorkout extends Model
{
    protected $fillable = [
        'lower_member_ids',
        'workout_id',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
