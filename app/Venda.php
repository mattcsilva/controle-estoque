<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'valor_total', 'id_cliente', 'id_vendedor'
    ];
    protected $primaryKey = 'id';
}
