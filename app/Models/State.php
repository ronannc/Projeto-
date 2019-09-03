<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class State
 *
 * @package App\Models
 *
 * @property string id
 * @property string initials
 * @property string name
 * @property City   cities
 */
class State extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'initials',
        'name',
        'pib_1000',
        'population',
        'region_id',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
