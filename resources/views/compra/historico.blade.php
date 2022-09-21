@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')
<script>
    $(function(
        $(".infocompra").on('click', function(){
            let id = $(this).attr("data-value")
            $.post('{{route("detalhes")}}', {idpedido : id}, (result) =>{
                $("#conteudo").html(result)
            })
        })
    ))
</script>
<div class="container">
    <div class="my-5">
        <div class="d-flex justify-content-between align-items-center my-3">
            <div class="title">
                <h4 class="fs-3">Minhas compras</h4>
            </div>            
            
        </div>
                     
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Data da compra</th>
                <th scope="col">Status</th>
                <th scope="col"></th>                
            </tr>
            </thead>
            <tbody>
                @foreach ($lista as $l)
                <tr>
                    <td>{{$l->datapedido->format("d/m/Y H:i")}}</td>
                    <td>{{$l->statusDesc()}}</td>                
                    
                </tr>
            @endforeach
            </tbody>
        </table> 
    </div>  
</div>
@endsection       
