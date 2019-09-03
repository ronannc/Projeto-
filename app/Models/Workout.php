<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Workout extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'start',
        'next_workout',
        'goal',
        'interval',
        'method_id',
        'frequency',
        'client_id',
    ];
}
