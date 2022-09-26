@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
@php
// SDK do Mercado Pago
require base_path('vendor/autoload.php');
// Adicione as credenciais
MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

$preference = new MercadoPago\Preference();
$total = 0;
foreach ($itensPedido as $ccc) {
    $total += $ccc->valor;      
    $item = new MercadoPago\Item();
    $item->title = "American Submarine";
    $item->quantity = $ccc->quantidade;
    $item->unit_price = $total;          
}
// Cria um item na preferência
$preference->back_urls = array(
    "success"=> route('pagamento', $pedido->id),
    "failure"=> "http://www.failure.com",
    "pending"=> "http://www.pending.com"
);
$preference->auto_return = "approved";

$preference->items = array($item);
$preference->save();
@endphp
<div class="container my-3">
    <div class="cadastrar border bg-light rounded">
        <div class="m-3">
            '<table class="table">
                <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Qtd</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Data</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;                        
                    @endphp
                    @foreach ($itensPedido as $cc)
                        <tr>            
                            <td>
                                @foreach ($product as $p)
                                    @if ($p->id == $cc->product_id)
                                        {{$p->title}}
                                    @endif
                                @endforeach
                            </td>             
                            <td>{{$cc->quantidade}}</td>
                            <td>{{$cc->valor}}</td>
                            <td>{{$cc->dataitem}}</td>                 
                        </tr>
                        @php
                            $total += $cc->valor;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <strong>Total do carrinho: R$ {{$total}}</strong> 
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="cho-container"></div>
        </div>
    </div>
</div>

{{-- SDK MercadoPago.js V2 --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>


<script>
const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
    locale: 'pt-BR'
});

mp.checkout({
    preference: {
    id: '{{ $preference->id }}'
    },
    render: {
    container: '.cho-container',
    label: 'Pagar',
    }
});
</script>
@endsection       
