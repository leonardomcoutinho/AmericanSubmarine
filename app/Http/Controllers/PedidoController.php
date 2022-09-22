<?php

namespace App\Http\Controllers;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\User;
use App\Services\VendaService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    public function cartFinalizar(Request $request)
    {
        
    }
    public function historico()
    {
        $data = [];
        $iduser = Auth::user()->id;

        $listapedido = Pedido::where('user_id', $iduser)->orderBy('datapedido', 'desc')->get();

        $data['lista'] = $listapedido;

        return view('compra.historico', $data);
    }
    public function pagar(Request $request)
    {
    
        $prods = session('cart', []);
        $vendaService = new VendaService;
        $result = $vendaService->finalizarVenda($prods, Auth::user());
        $pedido = $result['pedido'];        
        if ($result['status'] === 'success') {
            $request->session()->forget('cart');            
        }
        return redirect()->route('show', $pedido->id);
    }  
    public function show($id)
    {     
        $pedido = Pedido::findOrFail($id);
        $itensPedido = ItensPedido::where('pedido_id', $pedido->id)->get();
        $product = Product::all();     
    
        return view('compra.show', ['pedido' => $pedido, 'itensPedido'=>$itensPedido,'product' =>$product]);
    }
    public function pagamento($id, Request $request)
    {
        $pedido = Pedido::findOrFail($id);
        $pag_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$pag_id" . "?access_token=APP_USR-4591325151639720-092107-3630e2b47dc2c66a087d25eefb7cb81b-1202337220");

        $response = json_decode($response);
        $status = $response->status;
        $dtHoje = new DateTime;
        if ($status == "approved") {            
            $pedido->status = "APROVADO";
            $pedido->update();
            return redirect()->route('home',['status'=>$status])->with('success','Compra finalizada');
        }
            
    }
}
