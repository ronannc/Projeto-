<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Region extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'pib',
        'population',
    ];

}
