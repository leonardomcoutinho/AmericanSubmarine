@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
<div class="search bg-light py-3">
    <div class="container d-flex justify-content-center align-items-center">
      <form class="w-100" role="search" action="/" method="GET">               
        <div class="input-group mb-3">
            <input type="search" class="form-control rounded-start" name="search" placeholder="Procurar produto">
            <button class="input-group-text btn btn-success" id="search"><i class="bi bi-search"></i></button>
        </div>                                 
      </form>
    </div>
</div>
<div class="container d-flex flex-wrap gap-5 mt-5">
    @foreach ($products as $product)
        <div class="card" style="width: 18rem;">        
            <img src="{{ $product->image }}" class="img-fluid card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{$product->title}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <a href="#" class="btn btn-primary">Adicionar</a>
            </div>        
        </div>
    @endforeach
</div>
    
@endsection       
