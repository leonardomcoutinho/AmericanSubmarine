@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
<div class="container my-3">
    <h3 class="text-center w-100">Pedido: {{$pedido->id}} - Status: {{$pedido->status}}</h3>
    <div class="card ">        
        <div class="card-body">
          <h5 class="card-title"><i class="bi bi-person-fill"></i> - {{$pedido->user->name}}</h5>
          <p class="card-text"><i class="bi bi-truck"></i> - {{$pedido->user->logradouro}}, {{$pedido->user->numero}}, {{$pedido->user->complemento}}, {{$pedido->user->bairro}}, {{$pedido->user->cidade}}/{{$pedido->user->estado}}</p>
            <div class="lista-produtos border-top border-bottom py-3">
                <h6>Itens do pedido:</h6>
                    @foreach ($itensPedido as $i)
                    <ul>
                        <li>
                            @if ($i->product_id)
                            @foreach ($produto as $p)
                                @if ($i->product_id == $p->id)
                                    {{$p->title}}
                                @endif
                            @endforeach
                            @endif
                        </li>
                    </ul>
                        
                        
                    @endforeach
            </div>
            <div class="delivery border-top border-bottom">
                <h6>Entrega:</h6>
                <ul>
                    <li>Delivery</li>
                    <li>Retirar na loja</li>                    
                </ul>
            </div>
            <div class="pagamento border-top border-bottom">
                <h6>Forma de pagamento:</h6>
                <ul>
                    <li>Dinheiro</li>
                    <li>Cartão Debito</li>
                    <li>Cartão Credito</li>
                </ul>
            </div>
            <div class="recibemento border-top border-bottom">
                <h6>Forma de recebimento:</h6>
                <ul>
                    <li>Online</li>
                    <li>Na hora da entrega</li>                    
                </ul>
            </div>
          <a href="{{route('pedidos')}}" class="btn btn-primary mt-3">Voltar</a>
        </div>
      </div>
      
</div>
@endsection       
