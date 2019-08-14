<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'start',
        'next_workout',
        'note',
        'goal',
        'interval',
        'id_method',
        'frequency',
        'id_client',
    ];
}