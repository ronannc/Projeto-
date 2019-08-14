<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public const NAO_VERIFICADO = 0;

    protected $fillable = [
        'name',
        'cpf',
        'phone',
        'birthday',
        'weight'
    ];

    public function workout()
    {
        return Workout::where('id_client', $this->id)->get();
    }
}


