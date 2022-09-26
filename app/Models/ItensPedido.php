<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Pedido;

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

    public function produtos(){
        return $this->belongsTo(Product::class);
    }
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
