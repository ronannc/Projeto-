<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ShoulderWorkout extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'shoulder_id',
        'workout_id',
        'workout_mode_id',
        'load',
        'series',
        'rest_time',
        'repetition',
        'group',
        'sub_group',
        'ideal_weight'
    ];

    public function shoulder(){
        return $this->hasOne(Shoulder::class, 'id', 'shoulder_id');
    }
}
