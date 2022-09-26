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
                    <span class="text-dark" >R$: {{$product->price}}</span>
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
                    <span class="text-dark" >R$: {{$product->price}}</span>
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
                    <span class="text-dark" >R$: {{$product->price}}</span>
                    <a href="{{route('addcart', ['id' => $product->id])}}" class="btn btn-outline-success mt-2">Adicionar</a>
                </div>       
            </div>
        @endif        
    @endforeach
</div>
   
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrinho</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (isset($cart))
                    
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>                            
                            <th scope="col">Excluir item</th>                            
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $indece => $cc)
                          <tr>                            
                            <td><img src="{{$cc->image}}" alt="" width="30px"></td>
                            <td>{{$cc->title}}</td>
                            <td>{{$cc->price}}</td>
                            <td><a href="{{route('cart_delete' , ['indece' => $indece]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></td>
                          </tr> 
                            @php
                                $total += $cc->price;
                            @endphp
                          @endforeach                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    Total do carrinho: R$ {{$total}}
                                </td>
                            </tr>
                        </tfoot>
                      </table>
                    
                @else
                    {{dd($cart)}}
                    <div>Nenhum item no carrinho</div>
                @endif


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{route('pagar')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Finalizar compra</button>               
            </form>
            
            </div>
        </div>
        </div>
    </div>
    

@endsection       
