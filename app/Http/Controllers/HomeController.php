<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){
            $products = Product::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $products = Product::all();
        }

        

        return view('home', ['products' => $products, 'search' => $search]);
    }
}
