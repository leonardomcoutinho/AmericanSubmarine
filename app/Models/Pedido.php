<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function statusDesc(){
        $desc= "";
        switch($this->status){
            case 'PEN': $desc = "PENDENTE";break;
            case 'APR': $desc = "APROVADO";break;
            case 'CAN': $desc = "CANCELADO";break;
        }
        return $desc;
    }
}
