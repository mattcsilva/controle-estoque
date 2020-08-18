<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'descricao', 'unidade_medida', 'custo', 'preco', 'estoque', 'id_fornecedor'
    ];
    protected $primaryKey = 'id';
}
