@extends('layouts.main')
@section('title', 'Editar forma de pagamento')
@section('content')
<div class="container">    
    <form action="{{route("update_fp", $fpagamento->id)}}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fpagamento" class="form-label">Forma de pagamento:</label>
            <input class="form-control" type="text" name="fpagamento" id="fpagamento" value="{{$fpagamento->fpagamento}}">
        </div>                       
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>     
</div>
    
@endsection       
