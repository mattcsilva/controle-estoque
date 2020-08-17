<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'cnpj_cpf', 'telefone'
    ];
    protected $primaryKey = 'id';
}
