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
        'lower_member_id',
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

    public function lowerMember(){
        return $this->hasOne(LowerMember::class, 'id', 'lower_member_id');
    }
}
