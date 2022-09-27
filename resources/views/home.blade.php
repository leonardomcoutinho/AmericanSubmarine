@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
<div class="d-flex justify-content-between align-items-center m-3">
        <div class="search">
            <form class="w-100" role="search" action="/" method="GET">               
            <div class="input-group">
                <input type="search" class=" pesquisar rounded-start" name="search" placeholder="Pesquisar produto">
                <button class="input-group-text btn btn-outline-dark" id="search"><i class="bi bi-search"></i></button>
            </div>                                 
            </form>      
        </div> 
        <div class="botao">
        <button type="button" class="btn btn-outline-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-cart3"></i>- Ver Carrinho
            <div class="notification">         
                @if (count($cart) > 0)
                <div class="text-danger">
                 {{count($cart)}}
                </div>
                @endif              
            </div>
        </button>
        </div>
</div>
<div class="container d-flex flex-wrap gap-3">
    <h3 class="w-100 border-bottom">Sanduiches</h3>    
    @foreach ($products as $product)
        @if (isset($product->category_id) && $product->category_id == 1)
            <div class="card card-home d-flex flex-column bg-light">   
                <img src="{{ $product->image }}" class="img-fluid card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text m-1">{{$product->description}}</p>                    
                </div> 
                <div class="m-2 d-flex justify-content-between align-items-center border-top">
                    <h5 class="text-dark" >R$: {{$product->price}}</h5>
                    <a href="{{route('addcart', ['id' => $product->id])}}" class="btn btn-outline-success mt-2">Adicionar</a>
                </div>       
            </div>
        @endif        
    @endforeach
    <h3 class="w-100 border-bottom">Bebidas</h3>
    @foreach ($products as $product)
        @if (isset($product->category_id) && $product->category_id == 2)
            <div class="card card-home d-flex flex-column bg-light">   
                <img src="{{ $product->image }}" class="img-fluid card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text m-1">{{$product->description}}</p>                    
                </div> 
                <div class="m-2 d-flex justify-content-between align-items-center border-top">
                    <h5 class="text-dark" >R$: {{$product->price}}</h5>
                    <a href="{{route('addcart', ['id' => $product->id])}}" class="btn btn-outline-success mt-2">Adicionar</a>
                </div>       
            </div>
        @endif        
    @endforeach
    <h3 class="w-100 border-bottom">Outros</h3>
    @foreach ($products as $product)
        @if (isset($product->category_id) && $product->category_id > 2)
            <div class="card card-home d-flex flex-column bg-light">   
                <img src="{{ $product->image }}" class="img-fluid card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text m-1">{{$product->description}}</p>                    
                </div> 
                <div class="m-2 d-flex justify-content-between align-items-center border-top">
                    <h5 class="text-dark" >R$: {{$product->price}}</h5>
                    <a href="{{route('addcart', ['id' => $product->id])}}" class="btn btn-outline-success mt-2">Adicionar</a>
                </div>       
            </div>
        @endif        
    @endforeach
</div>   
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrinho</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('cart')) 
                    @php
                        $total = 0;
                    @endphp               
                    @foreach ($cart as $indece => $cc)
                        <div class="card-cart d-flex align-items-center border my-3 rounded">
                            <div class="card-cart-img">
                                <img src="{{$cc->image}}" alt="">
                            </div>
                            <div class="card-cart-body mx-2 my-2 pe-2 border-end">
                                <div class="title-card-cart">
                                    <h5>{{$cc->title}}</h5>
                                </div>
                                <div class="description-card-cart text-muted">
                                    {{$cc->description}}
                                </div>
                            </div>
                            <div class="card-cart-btn text-end">
                                <a href="{{route('cart_delete' , ['indece' => $indece]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                        @php
                                $total += $cc->price;
                                $total = number_format($total, 2, '.', '.');
                        @endphp
                    @endforeach 
                    <div class="py-2"><strong>Total: R${{$total}}</strong></div>                   
                @else                    
                    <div>Nenhum item no carrinho</div>
                @endif
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            @if (session('cart'))
            <button type="button" class="btn btn-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                Confirme o endereço
            </button>
            @endif
            </div>
        </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Endereço para entrega</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Logradouro</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Complemento</th>                            
                        <th scope="col">Bairro</th>                            
                        <th scope="col">Cidade</th>                           
                        <th scope="col">Editar</th>                           
                      </tr>
                    </thead>
                    <tbody>                        
                      <tr> 
                        @if (Auth::user())
                            <td>{{Auth::user()->logradouro}}</td>
                            <td>{{Auth::user()->numero}}</td>
                            <td>{{Auth::user()->complemento}}</td>
                            <td>{{Auth::user()->bairro}}</td>
                            <td>{{Auth::user()->cidade}}/{{Auth::user()->estado}}</td>                        
                            <td><a href="/endereco/edit/{{Auth::user()->id}}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></th> 
                        @endif                        
                      </tr>                                                  
                    </tbody>                    
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Voltar</button>
            <button type="button" class="btn btn-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                Escolha a forma de pagamento
            </button>  
            </div>
        </div>
        </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Forma de Pagamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">               
                <form action="{{route('pagar')}}" method="POST" class="">
                    @csrf
                    <select class="form-select" name="fpagamento" aria-label="Default select example">                        
                        @foreach ($fpagamento as $f)
                        <option value="{{$f->id}}">{{$f->fpagamento}}</option>                
                        @endforeach
                    </select>
                    <div class="w-100 border-top mt-3 p-1 text-end">
                        <button type="submit" class="my-3 btn btn-success text-end">Finalizar pedido</button>
                    </div>                  
                </form>                   
            </div>            
        </div>
        </div>
    </div>
@endsection       
