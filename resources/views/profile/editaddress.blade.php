@extends('layouts.main')
@section('title', 'Editar Endereço')
@section('content')
<div class="container my-3">
    <div class="cadastrar border bg-light rounded">   
        <form action="/endereco/update/{{$user->id}}" method="POST" class="m-3">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="logradouro" class="form-label">Logradouro:</label>
                    <input type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro" id="logradouro" value="{{$user->logradouro}}">     
                        @error('logradouro')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror                
                </div>                         
                <div class="mb-3 col-3">
                    <label for="numero" class="form-label">Numero:</label>
                    <input type="text" class="form-control" name="numero" id="numero" value="{{$user->numero}}">          
                </div>  
                <div class="mb-3 col-9">
                    <label for="complemento" class="form-label">Complemento:</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value="{{$user->complemento}}">          
                </div>
                <div class="mb-3 col-4">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="{{$user->complemento}}">          
                </div>
                <div class="mb-3 col-4">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" id="cidade" value="{{$user->cidade}}"> 
                    @error('cidade')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror         
                </div>
                <div class="mb-3 col-4">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control @error('estado') is-invalid @enderror" name="estado" id="estado" value="{{$user->estado}}"> 
                    @error('estado')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror         
                </div>            
            </div>             
                            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    
@endsection    


