<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function categoria(){

        $categories = Category::all();
        return view('products.categoria', ['categories' =>$categories]);
    }
    public function create(){
        $cat = Category::all();
        return view('products.create_category',['cat'=>$cat]);
    }
    public function store(Request $request){

        $cat = new Category;
        $request->validate([
            'category'=>'required'            
        ]);
        $cat->category = $request->category;

        $cat->save();

        return redirect()->route('categoria')->with('success', 'Categoria criada com sucesso!');
    }
    public function edit($id){
        $categories = Category::findOrFail($id);

        return view('products.edit_categories', ['categories'=>$categories]);
    }
    public function update(Request $request){
        $request->validate([
            'category'=>'required'            
        ]);
        Category::findOrFail($request->id)->update($request->all());

        return redirect()->route('categoria')->with('success', 'Categoria editada com sucesso!');
    }
    public function destroy($id){
        Category::findOrFail($id)->delete();

        return redirect()->route('categoria')->with('success', 'Categoria deletado com sucesso!');
    }
}
