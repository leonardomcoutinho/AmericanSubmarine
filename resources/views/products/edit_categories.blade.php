@extends('layouts.main')
@section('title', 'Editar Categoria')
@section('content')
<div class="container">
    <form action="{{route('update_cat', $categories->id)}}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category" class="form-label">Nome da Categoria:</label>
            <input class="form-control @error('category') is-invalid @enderror" type="text" name="category" id="category" value="{{$categories->category}}">
            @error('category')
                <div class="invalid-feedback">Categoria não pode ser nulo</div>
            @enderror
        </div>                       
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>      
    
</div>
    
@endsection       
