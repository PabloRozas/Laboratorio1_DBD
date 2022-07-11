@extends('layouts.main')

@section('content')
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <a class="navbar-brand" >DEBEDE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="">Contacto</a>
              </li>
              @guest
            @if (Route::has('login'))
            <li class="nav-item me-3">
                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" >
                    {{ Auth::user()->name }}
                </a>
            
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/usuario') }}"> Mi Perfil </a>
            
                    <div class="dropdown-menu-end " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
            </li>
            @endguest
              
            </ul>
            
          </div>
        </div>
      </nav>
</header>

<section>
    



    {{-- titulo Bienvenida con bootstrap centrado--}}
    <div class="container-xxl pt-5 ">
    <div class="container-xxl pt-5 pb-5">
    <div class="container-xxl pt-5 pb-5">
    <div class="container-xxl pt-5 pb-5">
    <div class="container-xxl pt-5 pb-5">
    <div class="container-xxl pt-5 pb-5">
    <div class="jumbotron text-center">
        <h1 class="display-4">Bienvenido a DEBEDE</h1>
        <p class="lead">Esta es una aplicación para escuchar la musica favorita.</p>
        <hr class="my-4">
        <p>
            
            @guest
                    <a href="/login" class="btn btn-primary btn-lg">Ingresa a la App</a>
            @else
                    <a href="/songs" class="btn btn-primary btn-lg">Ingresa a la App</a>
            @endguest
        </p>
        <p>

            @guest
                    <div class="container-xxl pb-5"></div>
            @else
                    @role('admin')
                        <a href="/users" class="btn btn-primary btn-lg">Dashboard</a>
                    @else
                        <div class="container-xxl pb-5"></div>
                    @endif
                    
            @endguest
        </p>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- Footer centrado --}}
<footer class="footer text-center">
    <div class="container">
        <span class="text-muted">DEBEDE 2022</span>
    </div>


    <p>Codigo disponible en <a href="https://github.com/PabloRozas/Laboratorio1_DBD" class="text-black">Github</a>,
        Hecho por <a href="" class="text-black">Grupo 6</a>.</p>
</footer>
@endsection