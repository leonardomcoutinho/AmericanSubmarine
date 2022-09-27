<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Fpagamento extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
