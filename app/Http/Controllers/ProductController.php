<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pedido;
use App\Models\Product;
use App\Services\VendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    private $_configs;
    public function __construct()
    {
        $this->_configs = new Configure();
    }
    public function produto()
    {
        $products = Product::all();

        return view('products.produtos', ['products' => $products]);
    }

    public function createProduct()
    {

        $cat = Category::all();

        return view('products.criar_produto', ['cat' => $cat]);
    }

    public function store(Request $request)
    {
        $products = new Product;

        $products->title = $request->title;
        $products->price = str_replace(",", ".", $request->price);
        $products->description = $request->description;
        $products->category_id = $request->category_id;



        //Image Upload

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->image;
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $image->move(public_path('img/products'), $imageName);
            $patch = "/img/products/";

            $products->image = $patch . $imageName;
        }

        $products->save();

        return redirect()->route('produto')->with('success', 'Produto cadastrado com sucesso');
    }
    public function editProduto($id)
    {
        $product = Product::findOrFail($id);
        $cat = Category::all();
        $categ = Category::findOrFail($id);

        return view('products.edit_produto', ['product' => $product, 'cat' => $cat, 'categ' => $categ]);
    }
    public function update(Request $request)
    {

        $data = $request->all();



        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->image;
            $extension = $image->extension();
            $imageName = md5($image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $image->move(public_path('img/products'), $imageName);
            $patch = "/img/products/";

            $data['image'] = $patch . $imageName;
        }
        Product::findOrFail($request->id)->update($data);

        return redirect()->route('produto')->with('success', 'Produto editado com sucesso!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('produto')->with('success', 'Produto editado com sucesso!');
    }

    public function addCart($id){
        $product = Product::findOrFail($id);

        if($product){
            $cart = session('cart', []);

            array_push($cart, $product);
            session(['cart'=> $cart]);

            return redirect()->route('home');
        }
    }
    public function cartDelete($indice){

        $cart = session('cart', []);
        if(isset($cart[$indice])){
            unset($cart[$indice]);
        }
        session(['cart' => $cart]);
        return redirect()->route('home');
    }  
    public function cartFinalizar(Request $request){
        $prods = session('cart', []);
        $vendaService = new VendaService;
        $result = $vendaService->finalizarVenda($prods, Auth::user());
        
        if($result['status']=== 'success'){
            $request->session()->forget('cart');
        }
        return redirect()->route('home')->with('success', 'compra finalizada');

    }  
    public function historico()
    {
       $data = [];
       $iduser = Auth::user()->id;

       $listapedido = Pedido::where('user_id', $iduser)->orderBy('datapedido', 'desc')->get();

       $data['lista'] = $listapedido;

       return view('compra.historico', $data);
    }
    public function pagar(Request $request){
        $data = [];

        return view('compra.pagar', $data);

    }
}
