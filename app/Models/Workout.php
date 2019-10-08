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
        'goal_id',
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

    public function biceps(){
        return $this->belongsToMany(Biceps::class, 'biceps_workouts', 'workout_id', 'biceps_id');
    }

    public function triceps(){
        return $this->belongsToMany(Triceps::class, 'triceps_workouts', 'workout_id', 'triceps_id');
    }

    public function back(){
        return $this->belongsToMany(Back::class, 'back_workouts', 'workout_id', 'back_id');
    }
}
