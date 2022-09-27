@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
<div class="container">
    <h3 class="my-5 w-100 border-bottom"> Lista de pedidos</h3>
    @foreach ($pedido as $p)
        <div class="card card-pedidos my-3 d-flex">
            <div class="card-header text-center
            @php
                if ($p->status == "PENDENTE") {
                    echo "bg-warning bg-opacity-25";
                }else if($p->status == "APROVADO"){
                    echo "bg-success bg-opacity-25";
                }else if($p->status == "CANCELADO"){
                    echo "bg-danger bg-opacity-25";
                }
            @endphp">Pedido: {{$p->id}} - Status: {{$p->status}}
            </div>            
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="bi bi-person-fill"></i> - {{$p->user->name}}</h5>
                <p class="card-text"><i class="bi bi-truck"></i> - {{$p->user->logradouro}}, {{$p->user->numero}}, {{$p->user->complemento}}, {{$p->user->bairro}}, {{$p->user->cidade}}/{{$p->user->estado}}</p> 
                <a href="{{route("ver_pedido", $p->id)}}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
            </div>
        </div>
    @endforeach
    @php
        
    @endphp
</div>
@endsection       
