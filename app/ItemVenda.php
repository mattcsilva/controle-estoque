<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $fillable = [
        'custo', 'quantidade', 'id_venda', 'id_produto'
    ];
    protected $primaryKey = 'id';
}
