<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class BackWorkout extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'back_id',
        'workout_id',
        'workout_id_modes',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];
}
