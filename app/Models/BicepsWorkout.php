<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class BicepsWorkout extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'biceps_id',
        'workout_id',
        'workout_mode_id',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group'
    ];

    public function biceps(){
        return $this->hasOne(Biceps::class, 'id', 'biceps_id');
    }
}
