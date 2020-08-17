<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'nome', 'cnpj', 'telefone'
    ];
    protected $primaryKey = 'id';
}
