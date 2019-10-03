<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Company extends Model implements AuditableContract
{
    use Auditable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string'
    ];

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

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function managers()
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'company_id', 'id');
    }

}
