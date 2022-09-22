<?php

namespace App\Services;

use App\Models\ItensPedido;
use App\Models\Pedido;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

class VendaService{

    public function finalizarVenda($prods = [], User $user)
    {
        try {
            DB::beginTransaction();

            $dtHoje = new DateTime;
            $pedido = new Pedido;
            
            $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s");
            $pedido->status = "PEN";
            $pedido->user_id = $user->id;
            
            $pedido->save();
           
            foreach($prods as $p){
                $itens = new ItensPedido;
                $itens->quantidade = 1;
                $itens->valor = $p->price;
                $itens->dataitem = $dtHoje->format("Y-m-d H:i:s");
                $itens->product_id = $p->id;
                $itens->pedido_id = $pedido->id;                
                $itens->save();                            
            }
            DB::commit();
            
            return [
                'status' =>'success',
                'message' => 'Venda finalizada com sucesso!', 
                'pedido' => $pedido         
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ERRO:VENDA SERVICE", ['message' => $e->getMessage()]);
            return ['status' =>'error','message' => 'Venda não pode ser finalizada!'];
        }
    }
}