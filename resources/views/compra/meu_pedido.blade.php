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
                        <li>{{$pedido->fpagamento->fpagamento}}</li>                        
                    </ul>
                </div>
                <div class="recibemento border-top border-bottom">
                    <h6>Forma de recebimento:</h6>
                    <ul>
                        @if ($pedido->fpagamento->id != 4 || $pedido->fpagamento->id != 3 )
                            <li>Na hora da entrega</li>
                        @else
                            <li>Online</li>
                        @endif                          
                    </ul>
                </div>
            <a href="{{route('home')}}" class="btn btn-primary mt-3">Voltar para tela inicial</a>
            </div>
        </div>
    </div>
    {{-- MODAL --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Forma de Pagamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">               
                <div class="col-12">
                    <div class="alert alert-success text-center">
                        <div>PEDIDO FINALIZADO!</div>
                        <div>Seu pedido será entregue de 40 a 60 minutos</div>
                        <div>Para mais informações, entre em contato conosco via whatsapp -> <a href="https://wa.me/5564992750425" target="__blank" class="btn btn-success rounded-circle"><i class="bi bi-whatsapp"></i></a></div>
                    </div>
                </div>                 
            </div>        
        </div>
        </div>
    </div>    
    <script>
        $(document).ready(function(){
                $("#exampleModal").modal('show');
        });
    </script>
@endsection       
