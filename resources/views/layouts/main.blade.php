<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/logo.png">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">   
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
    <title>@yield('title')</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid d-flex flex-column ">
              <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.png" alt="" width="200px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto my-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('home')}}">Inicio</a>
                  </li>
                  @if (Auth::user() && Auth::user()->admin)
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('produto')}}">Produtos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('categoria')}}">Categorias</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('usuario')}}">Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('pedidos')}}">Pedidos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{route('fpagamento')}}">Forma de Pagamento</a>
                  </li>
                  @endif       
                  @if (Route::has('login'))    
                      @auth
                        <a href="{{ route('login') }}" class="btn btn-outline-info mx-2">Profile</a>                      
                          @else
                              <a href="{{ route('login') }}" class="btn btn-outline-info mx-2">Entrar</a>

                          @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="btn btn-outline-info mx-2">Cadastrar</a>
                          @endif
                      @endauth    
                  @endif
                </ul>
              </div>
            </div>            
          </nav>          
    </header>
    <main class="pb-3">
      <div class="container">
        <div class="row">
          @if (session('error'))
                <div class="col-12">
                    <div class="alert alert-danger text-center">{{ session('error')}}</div>
                </div>
            @endif
            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-success text-center">{{ session('success')}}</div>
                </div>
            @endif
        </div>
      </div>
      @yield('content')
    </main>
    <footer class="footer bg-dark border-top py-5">
      <div class="container border-top d-flex justify-content-between align-items-center py-2">
        <div class="col-md-4 d-flex align-items-center">
          <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <img src="/img/logo.png" alt="" width="50px">
          </a>
          <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
        </div>  
        <div class="links-footer">  
          <ul class="col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-instagram"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-facebook"></i></a></li>
            <li class="ms-3"><a class="text-light" href="#"><i class="bi bi-whatsapp"></i></a></li>          
          </ul>
        </div>
      </div>
    </footer>

</body>
</html>