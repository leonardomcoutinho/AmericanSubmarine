@extends('layouts.main')
@section('title', 'Editar Categoria')
@section('content')
<div class="container">
    <form action="/editar/categoria/{{$categories->id}}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category" class="form-label">Nome da Categoria:</label>
            <input class="form-control" type="text" name="category" id="category" value="{{$categories->category}}">
        </div>                       
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>      
    
</div>
    
@endsection       
