@extends('layouts.main')
@section('content')

    <body class="d-flex h-100 text-center text-white bg-dark">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0">DEBEDE</h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        {{-- <a class="nav-link" href="#">Features</a> --}}
                        <a class="nav-link me-3" href="#">Contacto</a>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-3">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="dropdown ms-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/usuario') }}"> Mi Perfil </a>

                                <div class="dropdown-menu-end " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </nav>
                </div>
            </header>

            <main class="px-3 justify-content-center">
                <h1>Cover your page.</h1>
                <p class="lead">DEBEDE es tu nueva plataform para escuchar musica cuando quieras, donde quieras.</p>
                <p class="lead">Especialmente construida para los alumnos de la USACH, por alumnos de la USACH.</p>
                <p class="lead">
                    @guest
                    <a href="/login" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Ingresa a la App</a>
                    @else
                    <a href="/songs" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Ingresa a la App</a>
                    @endguest
                </p>
            </main>

            <footer class="mt-auto text-white-50">
                <p>Codigo disponible en <a href="https://github.com/PabloRozas/Laboratorio1_DBD"
                        class="text-white">Github</a>, Hecho por <a href="" class="text-white">Grupo 6</a>.</p>
            </footer>
        </div>
