@extends('layouts.main')
@section('title', 'Criar Produto')
@section('content')
<div class="container">
    <form action="/editar/produto/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Imagem do Produto:</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Nome do Produto:</label>
          <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}">          
        </div>
        <div class="d-flex mb-3">      
          <div class="form-floating w-100">
              <select class="form-select" name="category_id" id="category_id" aria-label="Floating label select example">
                  <option selected value="{{$categ->id}}">{{$categ->category}}</option>
                  @foreach ($cat as $c)
                  <option value="{{$c->id}}">{{$c->category}}</option>
                  @endforeach
              </select>
              <label for="category_id">Selecione a categoria</label>              
          </div>
          <div class="d-flex justify-content-center align-items-center mx-2">
            <a href="{{route('criar_categoria')}}" class="btn btn-primary"><i class="bi bi-plus-lg"></i></a>
          </div>
        </div>                  
        <div class="mb-3">
          <label for="price" class="form-label">Preço do Produto:</label>
          <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}">          
        </div>                
        <div class="mb-3">
          <label for="description" class="form-label">Descrição do produto:</label>
          <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>                    
        </div>                
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>    
</div>
    
@endsection       
