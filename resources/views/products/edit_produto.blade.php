@extends('layouts.main')
@section('title', 'Editar Produto')
@section('content')
<div class="container my-3">
  <div class="cadastrar border bg-light rounded">
    <form action="/editar/produto/{{$product->id}}" method="POST" class="m-3" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Imagem do Produto:</label>
            <input class="form-control" type="file" name="image" id="image">
            
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Nome do Produto:</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$product->title}}">
          @error('title')<div class="invalid-feedback">{{$message}}</div>@enderror          
        </div>
        <div class="d-flex mb-3">      
          <div class="form-floating w-100">
              <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" aria-label="Floating label select example">
                  <option selected value="{{$categ->id}}">{{$categ->category}}</option>
                  @foreach ($cat as $c)
                  <option value="{{$c->id}}">{{$c->category}}</option>
                  @endforeach
              </select>
              @error('category_id')<div class="invalid-feedback">{{$message}}</div>@enderror
              <label for="category_id">Selecione a categoria</label>              
          </div>          
        </div>                  
        <div class="mb-3">
          <label for="price" class="form-label">Preço do Produto:</label>
          <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{$product->price}}"> 
          @error('price')<div class="invalid-feedback">{{$message}}</div>@enderror         
        </div>                
        <div class="mb-3">
          <label for="description" class="form-label">Descrição do produto:</label>
          <textarea name="description" id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{$product->description}}</textarea> 
          @error('description')<div class="invalid-feedback">{{$message}}</div>@enderror                   
        </div>                
        <button type="submit" class="btn btn-outline-primary">Editar</button>
    </form> 
  </div>   
</div>
    
@endsection       
