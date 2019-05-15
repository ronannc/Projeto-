<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";


    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'nascimento',
    ];

    public function treino(){
        return Treino::where('id_cliente', $this->id)->get();
    }
}


