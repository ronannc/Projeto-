<?php

namespace App\Support;

abstract class BloodType
{
    const NAMES = [
        'A+',
        'B+',
        'O+',
        'A-',
        'B-',
        'O-',
        'AB+',
        'AB-'
    ];
    const IMPLODED_NAMES = 'A+,B+,O+,A-,B-,O-,AB+,AB-';
}
