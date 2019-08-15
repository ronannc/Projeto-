<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class State extends Model
{
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
