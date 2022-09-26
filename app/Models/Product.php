<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ItensPedido;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoria(){
        return $this->belongsTo(Category::class);
    }
    public function itensPedido(){
        return $this->belongsTo(ItensPedido::class);
    }

}
