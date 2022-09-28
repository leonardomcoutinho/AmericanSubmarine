<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard</title>
        <link rel="shortcut icon" href="/img/logo.png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">   
        <script src="https://code.jquery.com/jquery-3.6.1.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <header class="">
                <nav class="navbar navbar-expand-lg bg-dark">
                    <div class="container-fluid d-flex flex-column ">
                      <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.png" alt="" width="200px"></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto my-2 mb-lg-0">
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('home')}}">Inicio</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('home')}}">Contato</a>
                          </li>
                          @if (Auth::user() && Auth::user()->admin)
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('produto')}}">Produtos</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('categoria')}}">Categorias</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('usuario')}}">Usuarios</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('pedidos')}}">Pedidos</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link text-light" aria-current="page" href="{{route('fpagamento')}}">Forma de Pagamento</a>
                          </li>
                          @endif       
                          <div class="d-flex position-absolute top-0 end-0 align-items-center">    
                            @if (Route::has('login'))    
                                @auth
                                  <h6 class="text-light">Olá, {{Auth::user()->name}}</h6>
                                  <a href="{{ route('profile.show') }}" class="btn btn-outline-info m-2">Profile</a> 
                                  <a href="{{ route('endereco') }}" class="btn btn-outline-info m-2"><i class="bi bi-pencil me-2"></i>Endereço</a>
                                  <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <button type="submit" class="btn btn-outline-info m-2">Sair</button>                          
                                </form>                     
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-info m-2">Entrar</a>
                                    @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-outline-info m-2">Cadastrar</a>
                                    @endif
                                @endauth    
                            @endif
                          </div>
                        </ul>
                      </div>
                    </div>            
                  </nav>          
            </header>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        
    </body>
</html>
