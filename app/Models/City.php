<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * Class City
 *
 * @property string id
 * @property string name
 * @property int    population
 * @property int    state_id
 * @property State  state
 */
class City extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'name',
        'population',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
