@extends('layouts.main')
@section('title', 'Criar Produto')
@section('content')
<div class="container my-3">
  <div class="cadastrar border bg-light rounded">
    <form action="{{route('store_product')}}" method="POST" class="m-3" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Imagem do Produto:</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Nome do Produto:</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">          
        </div>
        <div class="d-flex mb-3">      
          <div class="form-floating w-100">
              <select class="form-select" name="category_id" id="category_id" aria-label="Floating label select example">
                  <option selected>Clique para selecionar</option>
                  @foreach ($cat as $c)
                  <option value="{{$c->id}}">{{$c->category}}</option>
                  @endforeach
              </select>
              <label for="category_id">Selecione a categoria</label>              
          </div>
          <div class="d-flex justify-content-center align-items-center mx-2">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="bi bi-plus-lg"></i>
            </button>            
          </div>
        </div>                  
        <div class="mb-3">
          <label for="price" class="form-label">Preço do Produto:</label>
          <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp">          
        </div>                
        <div class="mb-3">
          <label for="description" class="form-label">Descrição do produto:</label>
          <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>                    
        </div>                
        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
    </form>
  </div> 
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Cartegoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('store_cat')}}" method="POST" class="mt-3">
          @csrf
          <div class="input-group mb-3">
              <input type="text" class="form-control rounded-start" name="category" placeholder="Criar nova categoria">
              <button class="input-group-text btn btn-success" id="category">Criar</button>
            </div>                                   
        </form>
      </div>      
    </div>
  </div>
</div>   
@endsection       
