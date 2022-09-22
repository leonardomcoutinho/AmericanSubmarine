@extends('layouts.main')
@section('title', 'American Submarine')
@section('content')

@php
    // SDK do Mercado Pago
    require base_path('vendor/autoload.php');
    // Adicione as credenciais
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    $preference = new MercadoPago\Preference();
    $total = 0;
    foreach ($cart as $ccc) {
        $total += $ccc->price;      
        $item = new MercadoPago\Item();
        $item->title = $ccc->title;
        $item->quantity = 1;
        $item->unit_price = $total;          
    }
    // Cria um item na preferência
    $preference->back_urls = array(
        "success"=> route('pagamento'),
        "failure"=> "http://www.failure.com",
        "pending"=> "http://www.pending.com"
    );
    $preference->auto_return = "approved";

    $preference->items = array($item);
    $preference->save();
@endphp
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            
            <th scope="col">Produto</th>
            <th scope="col">Descricão</th>
            <th scope="col">Preço</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($cart as $cc)
            <tr>            
                <td><img src="{{$cc->image}}" alt="" width="50px"></td>                
                <td>{{$cc->title}}</td>
                <td>{{$cc->description}}</td>
                <td>{{$cc->price}}</td>              
            </tr>
            @endforeach
        
        
    </table>
    <div class="cho-container"></div>
</div>

{{-- SDK MercadoPago.js V2 --}}
<script src="https://sdk.mercadopago.com/js/v2"></script>
    
    
<script>
    const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
        locale: 'pt-BR'
    });

    mp.checkout({
        preference: {
        id: '{{ $preference->id }}'
        },
        render: {
        container: '.cho-container',
        label: 'Pagar',
        }
    });
</script>
@endsection       
