<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PhysicalAssessment extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'neck',
        'shoulder',
        'chest',
        'right_arm',
        'left_arm',
        'right_forearm',
        'left_forearm',
        'waist',
        'abdomen',
        'hip',
        'right_thigh',
        'left_thigh',
        'right_calf',
        'left_calf',
        'weight',
        'height',
        'blood_pressure',
        'imc',
        'date',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
