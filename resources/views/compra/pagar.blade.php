@extends('layouts.main')
@section('title', 'American Submarine')
@section('scriptjs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection
@section('content')
<form action="">
    @csrf
    <div class="row">
        <div class="col-4">
            Cartão de Crédito:
            <input type="text" name="ncredito" class="ncredito form-control">
        </div>
        <div class="col-4">
            CVV:
            <input type="text" name="ncvv" class="ncvv form-control">
        </div>
        <div class="col-4">
            Mês de expiração:
            <input type="text" name="mesexp" class="mesexp form-control">
        </div>
        <div class="col-4">
            Ano de expiração:
            <input type="text" name="anoexp" class="anoexp form-control">
        </div>
        <div class="col-4">
            Nome no cartão:
            <input type="text" name="nomecartao" class="nomecartao form-control">
        </div>
        <div class="col-4">
            Parcelas:
            <input type="text" name="nparcela" class="nparcela form-control">
        </div>
        <div class="col-4">
            Valor total:
            <input type="text" name="totalfinal" class="totalfinal form-control">
        </div>
        <div class="col-4">
            Valor da parcela:
            <input type="text" name="totalparcelado" class="totalparcelado form-control">
        </div>
        
    </div>
    <input type="button" value="Pagar" class="btn btn-success pagar">
</form>
@endsection       
