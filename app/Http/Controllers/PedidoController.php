<?php

namespace App\Http\Controllers;

use App\Models\Fpagamento;
use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\User;
use App\Services\VendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class PedidoController extends Controller
{
    public function pagar(Request $request)
    {
        $prods = session('cart', []);
        $vendaService = new VendaService;        
        $result = $vendaService->finalizarVenda($prods, Auth::user());
        $pedido = $result['pedido'];
        $pedido->fpagamento_id = $request->fpagamento;   
        if ($result['status'] === 'success') {
            $request->session()->forget('cart');
            $pedido->update();            
        }
        return redirect()->route('show', $pedido->id);
    }     
    public function show($id)
    {     
        $pedido = Pedido::findOrFail($id);
        $itensPedido = ItensPedido::where('pedido_id', $pedido->id)->get();
        $product = Product::all();
        $fpagamento = Fpagamento::all();  
    
        return view('compra.show', ['pedido' => $pedido, 'itensPedido'=>$itensPedido,'product' =>$product,'fpagamento'=> $fpagamento]);
    }
    public function attPag($id, Request $request){
        $pedido = Pedido::findOrFail($id);
        $pedido->fpagamento_id = $request->fpagamento;
        $pedido->update();

        return redirect()->route('show', $pedido->id);
    }
    public function pagDinheiro($id){
        $pedido = Pedido::findOrFail($id);
        $pedido->status = "APROVADO";
        $pedido->update();
        return redirect()->route('meu_pedido', $pedido->id)->with('success',"Pedido $pedido->id finalizado com sucess!");
    }
    public function pagamento($id, Request $request)
    {
        $pedido = Pedido::findOrFail($id);
        $pag_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$pag_id" . "?access_token=APP_USR-4591325151639720-092107-3630e2b47dc2c66a087d25eefb7cb81b-1202337220");

        $response = json_decode($response);
        $status = $response->status;        
        if ($status == "approved") {            
            $pedido->status = "APROVADO";
            $pedido->update();
            return redirect()->route('meu_pedido', $pedido->id)->with('success',"Pedido $pedido->id finalizado com sucess!");
        }

    }
    public function meuPedido($id){
        $pedido = Pedido::findOrFail($id);
        $itensPedido = ItensPedido::where('pedido_id', $pedido->id)->get();         
        $produto = Product::all();
        // $fpagamento = Fpagamento::where('fpagamento_id');

        return view('compra.meu_pedido', ['pedido'=>$pedido, 'itensPedido'=>$itensPedido, 'produto'=>$produto]);
    }
    public function pedidos(){
        $pedido = Pedido::orderBy('id','desc')->get();              
             
        return view('pedido.pedidos',['pedido' => $pedido]);
    }
    public function verPedido($id){
        $pedido = Pedido::findOrFail($id);
        $itensPedido = ItensPedido::where('pedido_id', $pedido->id)->get();         
        $produto = Product::all();
        return view('pedido.ver_pedido', ['pedido'=>$pedido, 'itensPedido'=>$itensPedido, 'produto'=>$produto]);
    }
}
