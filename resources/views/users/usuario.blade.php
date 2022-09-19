@extends('layouts.main')
@section('title', 'Criar Categoria')
@section('content')

<div class="container">     
    <div class="my-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="title">
                <h4 class="fs-3">Usuarios</h4>
            </div>
            <div class="create">
                <a href="{{ route('criar_produto')}}" class="btn btn-success"><i class="bi bi-plus-lg"></i></a>
            </div>
        </div>         
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>                    
                <th scope="col">Email</th>                    
                <th scope="col">Endereço</th>                    
                <th scope="col">Data Criação</th>                    
                <th scope="col">Editar</th>                    
                <th scope="col">Excluir</th>                    
            </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->logradouro}}, {{$u->numero}}, {{$u->complemento}}, {{$u->bairro}}, {{$u->cidade}}/{{$u->estado}}</td>
                    <td>{{$u->created_at}}</td>
                    <td><a href="/editar/categoria/{{$u->id}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                    <td><a href="" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a></td>                
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>  
</div>

@endsection       
