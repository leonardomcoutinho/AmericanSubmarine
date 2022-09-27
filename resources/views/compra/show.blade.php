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
            <div class="ms-2 my-3 pb-3 border-bottom">
                <h5 class="card-title"><i class="bi bi-person-fill"></i> - {{$pedido->user->name}}</h5>
                <p class="card-text"><i class="bi bi-truck"></i> - {{$pedido->user->logradouro}}, {{$pedido->user->numero}}, {{$pedido->user->complemento}}, {{$pedido->user->bairro}}, {{$pedido->user->cidade}}/{{$pedido->user->estado}}</p>
            </div>
            <table class="table-sm">
                <h5>Pedido {{$pedido->id}}:</h5>
                <thead>
                <tr class="">
                    <th scope="col">Produto</th>
                    <th scope="col">Qtd</th>
                    <th scope="col">Preço</th>                    
                </tr>
                </thead>
                <tbody class="table-group-divider">
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
                        </tr>
                        @php
                            $total = $cc->valor;
                            $total = number_format($total, 2, '.', '.');
                        @endphp
                    @endforeach
                </tbody>               
                
            </table>
            <div class="fpagamento">
                <div class="d-flex align-items-center">Forma de pagamento: 
                    @foreach ($fpagamento as $f)
                        @if ($pedido->fpagamento_id == $f->id)
                            {{$f->fpagamento}}
                        @endif
                    @endforeach
                    <button type="button" class="ms-5 btn btn-outline-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Trocar
                    </button>
                </div>
            </div>            
            <div class="my-2 py-2 border-top border-bottom">                
                <strong>Total: R$ {{$total}}</strong>                     
            </div>
                @if ($pedido->fpagamento_id != 4 && $pedido->fpagamento_id != 3)
                    <form action="{{route("pagdinheiro", $pedido->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-success">Finalizar</button>
                    </form>                    
                @endif
                <div class="cho-container"></div>
        </div>
    </div>
</div>

{{-- SDK MercadoPago.js V2 --}}

@if ($pedido->fpagamento_id == 4 || $pedido->fpagamento_id == 3)
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
@endif

{{-- MODAL --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forma de Pagamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">               
                <form action="{{route('attpag', $pedido->id)}}" method="POST" class="d-flex">
                    @csrf
                    @method("PUT")
                    <select class="form-select" name="fpagamento" aria-label="Default select example">                        
                        @foreach ($fpagamento as $f)
                        <option value="{{$f->id}}">{{$f->fpagamento}}</option>                
                        @endforeach
                    </select> 
                    <button type="submit" class=" m-2 btn btn-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                        <i class="bi bi-check-lg"></i>
                    </button>
                </form>                
        </div>        
    </div>
    </div>
</div>
@if ($pedido->fpagamento_id == 1)
<script>
    $(document).ready(function(){
            $("#exampleModal").modal('show');
    });
</script>
@endif 

@endsection       
