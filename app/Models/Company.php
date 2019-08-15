<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'social_reason',
        'cnpj',
        'phone',
        'street',
        'neighborhood',
        'number',
        'complement',
        'zipcode',
        'logo',
        'city_id'
    ];
}
