<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid ">
              <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.png" alt="" width="200px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Inicio</a>
                  </li>         
                </ul> 
                              
                @if (Route::has('login'))    
                    @auth
                      <a href="{{ route('login') }}" class="btn btn-primary mx-2">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Entrar</a>

                        @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary mx-2">Cadastrar</a>
                        @endif
                    @endauth    
                @endif
              </div>
            </div>            
          </nav>          
    </header>
    <main>
      <div class="container-fluid">
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
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>