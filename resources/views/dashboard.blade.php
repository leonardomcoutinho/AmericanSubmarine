<x-app-layout>
    <x-slot name="header">  
            
               
        {{-- MODAL --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content ">        
        <div class="modal-body bg-success p-2 text-dark bg-opacity-25">               
            <div class="fs-1 text-center">
                <h5 class="mb-5">Seja bem vindo, {{Auth::user()->name}}.</h5> 
                <p>American Submarine agradece a preferência, volte ao site e faça já seu pedido!</p>
                <a href="{{route('home')}}" class="btn btn-success btn-lg">Voltar ao site</a>
            </div>                 
        </div>        
    </div>
    </div>
</div>
<script>
    $(document).ready(function(){
            $("#exampleModal").modal('show');
    });
</script>
    </x-slot>    
</x-app-layout>
