@extends('layouts.main')
@section('title', 'Endereço')
@section('content')
<div class="container my-3">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Logradouro</th>
            <th scope="col">Numero</th>
            <th scope="col">Complemento</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Editar</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{auth()->user()->logradouro}}</th>
            <td>{{auth()->user()->numero}}</th>
            <td>{{auth()->user()->complemento}}</th>
            <td>{{auth()->user()->cidade}}</th>
            <td>{{auth()->user()->estado}}</th>    
            <td><a href="/endereco/edit/{{auth()->user()->id}}" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></th>    
          </tr>          
        </tbody>
      </table>
</div>
    
@endsection    

