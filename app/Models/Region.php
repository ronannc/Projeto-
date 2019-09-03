<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class Region
 *
 * @package App\Models
 *
 * @property string id
 * @property string name
 * @property double pib
 * @property int    population
 */
class Region extends Model implements AuditableContract
{
    use Auditable;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'pib',
        'population',
    ];

}
