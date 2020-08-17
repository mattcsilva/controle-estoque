<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = [
        'nome', 'cnpj_cpf', 'telefone'
    ];
    protected $primaryKey = 'id';
}
