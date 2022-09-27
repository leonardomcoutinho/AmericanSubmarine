@extends('layouts.main')
@section('title', 'Formas de pagamento')
@section('content')    
    <div class="container">
        <div class="my-5">
            <div class="d-flex justify-content-between align-items-center my-3">
                <div class="title">
                    <h4 class="fs-3">Formas de pagamento</h4>
                </div>
                <form action="{{route('store_fp')}}" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-start" name="fpagamento" placeholder="Forma de pagamento">
                        <button class="input-group-text btn btn-outline-success" id="fpagamento">Criar</button>
                      </div>                                   
                </form>
            </div>
             
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Forma de pagamento</th>                    
                    <th scope="col">Editar</th>                    
                    <th scope="col">Excluir</th>                    
                </tr>
                </thead>
                <tbody>
                    @foreach ($fpagamento as $f)
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->fpagamento}}</td>
                        <td><a href="{{route("edit_fp", $f->id)}}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a></td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>                
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> 
    </div>
@endsection       
