<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    public const NAO_VERIFICADO = 0;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'nascimento',
        'peso'
    ];

    public function treino(){
        return Treino::where('id_cliente', $this->id)->get();
    }

    public function configuracao(){
        return ConfiguracaoCliente::where('id_cliente', $this->id)->first();
    }
}


