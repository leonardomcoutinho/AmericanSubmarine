<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $dates = ['datapedido'];
    protected $tillable = [
        'datapedido',
        'status',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
