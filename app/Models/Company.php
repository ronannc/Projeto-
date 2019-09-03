<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Company extends Model implements AuditableContract
{
    use Auditable;

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
