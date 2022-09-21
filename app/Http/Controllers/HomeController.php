<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id = 0){

        $search = request('search');

        if($search){
            $products = Product::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $products = Product::all();
        }
        
            $cart = session('cart', []);
        
        
        
        return view('home', ['products' => $products, 'search' => $search, 'cart'=>$cart]);
    }
      
}
