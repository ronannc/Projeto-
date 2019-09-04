<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LowerMemberWorkout extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

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
