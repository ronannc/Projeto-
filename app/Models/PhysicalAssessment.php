<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalAssessment extends Model
{
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
        'Weight',
        'height',
        'blood_pressure',
        'client_id'
    ];
}
