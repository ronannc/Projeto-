<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracaoCliente extends Model
{
    protected $table = "configuracao_cliente";

    protected $fillable = [
        'formula',
        'porcentagem',
        'id_cliente'
    ];


}
