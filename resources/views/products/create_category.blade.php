@extends('layouts.main')
@section('title', 'Criar Categoria')
@section('content')
<div class="container">
     
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Categoria</th>            
          </tr>
        </thead>
        <tbody>
          @foreach ($cat as $c)
          <tr> 
            <td>{{$c->id}}</td>
            <td>{{$c->category}}</td>
          </tr> 
          @endforeach         
        </tbody>
      </table>
</div>
    
@endsection       
