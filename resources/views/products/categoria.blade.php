@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
<div class="container">
    <div class="my-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="title">
                <h4 class="fs-3">Categorias</h4>
            </div>
            <form action="{{route('store_cat')}}" method="POST" class="mt-3">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-start" name="category" placeholder="Criar nova categoria">
                    <button class="input-group-text btn btn-outline-success" id="category">Criar</button>
                  </div>                                   
            </form>
        </div>
         
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Categoria</th>                    
                <th scope="col">Editar</th>                    
                <th scope="col">Excluir</th>                    
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->category}}</td>
                    <td><a href="/editar/categoria/{{$c->id}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                    <td>
                        <form action="/deletar/categoria/{{$c->id}}" method="POST">
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
