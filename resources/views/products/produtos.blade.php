@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
<div class="container">
    <div class="my-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="title">
                <h4 class="fs-3">Produtos</h4>
            </div>
            <div class="create">
                <a href="{{ route('criar_produto')}}" class="btn btn-success"><i class="bi bi-plus-lg"></i></a>
            </div>
            
        </div>
                     
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col">Valor</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->description}}</td>
                    <td><img src="{{$p->image}}" alt="" width="30px"></td>
                    <td>{{$p->price}}</td>
                    <td><a href="/editar/produto/{{$p->id}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                    <td>
                        <form action="/deletar/produto/{{$p->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> 
    </div>  
</div>
    
@endsection       
