<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Workout extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'start',
        'next_workout',
        'interval',
        'goal',
        'method',
        'obs',
        'frequency',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function exercises()
    {
        $this['biceps'] = $this->biceps()->get();
        $this['triceps'] = $this->triceps()->get();
        $this['lower_member'] = $this->lowerMember()->get();
        $this['breast'] = $this->breast()->get();
        $this['shoulder'] = $this->shoulder()->get();
        $this['back'] = $this->back()->get();
        return $this;
    }

    public function biceps()
    {
        return $this->belongsToMany(Biceps::class, 'biceps_workouts', 'workout_id', 'biceps_id');
    }

    public function triceps()
    {
        return $this->belongsToMany(Triceps::class, 'triceps_workouts', 'workout_id', 'triceps_id');
    }

    public function lowerMember()
    {
        return $this->belongsToMany(LowerMember::class, 'lower_member_workouts', 'workout_id', 'lower_member_id');
    }

    public function breast()
    {
        return $this->belongsToMany(Breast::class, 'breast_workouts', 'workout_id', 'breast_id');
    }

    public function shoulder()
    {
        return $this->belongsToMany(Shoulder::class, 'shoulder_workouts', 'workout_id', 'shoulder_id');
    }

    public function back()
    {
        return $this->belongsToMany(Back::class, 'back_workouts', 'workout_id', 'back_id');
    }
}
