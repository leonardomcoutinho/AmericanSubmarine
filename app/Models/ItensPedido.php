<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    use HasFactory;
    protected $table = 'itens_pedidos';
    protected $tillable = [
        'quantidade',
        'valor',
        'dataitem',
        'product_id',
        'pedido_id',
    ];
}
