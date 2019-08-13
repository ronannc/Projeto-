<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TricepsWorkout extends Model
{
    protected $fillable = [
        'id_triceps',
        'id_training',
        'load',
        'series',
        'repetition',
        'group'
    ];
}
