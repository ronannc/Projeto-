<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biceps extends Model
{
    protected $fillable = [
        'exercise',
        'description',
    ];
}
