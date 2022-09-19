<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function produto(){
        $products = Product::all();

        return view('products.produtos',['products'=>$products]);
    }

    public function createProduct(){

        $cat = Category::all();
        
        return view('products.criar_produto', ['cat' => $cat]);
    }
    public function store(Request $request){
        $products = new Product;

        $products->title = $request->title;
        $products->price = str_replace(",",".",$request->price);                
        $products->description = $request->description;        
        $products->category_id = $request->category_id;
        
        

        //Image Upload

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $image = $request->image;            
            $extension = $image->extension();            
            $imageName = md5($image->getClientOriginalName().strtotime('now')).".".$extension;

            $image->move(public_path('img/products'), $imageName);
            $patch = "/img/products/";

            $products->image = $patch.$imageName;
        }

        $products->save();

        return redirect()->route('produto')->with('success', 'Produto cadastrado com sucesso');
    }
    public function editProduto($id){
        $product = Product::findOrFail($id);
        $cat = Category::all();
        $categ = Category::findOrFail($id);

        return view('products.edit_produto', ['product'=>$product, 'cat'=>$cat, 'categ'=>$categ]);
    }
    public function update(Request $request){

        $data = $request->all();

        

        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            $image = $request->image;            
            $extension = $image->extension();            
            $imageName = md5($image->getClientOriginalName().strtotime('now')).".".$extension;

            $image->move(public_path('img/products'), $imageName);
            $patch = "/img/products/";

            $data['image'] = $patch.$imageName;
        }
        Product::findOrFail($request->id)->update($data);

        return redirect()->route('produto')->with('success', 'Produto editado com sucesso!');

    }
    public function destroy($id){
        Product::findOrFail($id)->delete();

        return redirect()->route('produto')->with('success', 'Produto editado com sucesso!');
    }
}
