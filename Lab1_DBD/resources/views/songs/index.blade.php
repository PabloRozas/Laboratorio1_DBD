@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
@extends('layouts.main')
@section('content')

    <body>

        {{-- Grid art --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class=" ms-2 navbar-brand" href="#">DEBEDE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/songs') }}">Inicio<span class="sr-only">(Actual)</span></a>
                    </li>
                    @if (Auth::check())

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

                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/usuario') }}"> Mi Perfil </a>

                    @endif
                </ul>

                <div>
                    <form action="{{ route('songs.filter') }}" method="GET">
                        <div class="d-flex justify-content-end">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control" value="{{ $titulo ?? '' }}">
                            <button class="btn btn-primary ms-2" type="submit">Buscar</button>

                        </div>
                    </form>
                </div>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('songs/filter') }}">Busqueda Avanzada</a>
                    </li>
                    @if (@Auth::user()->hasRole(['admin', 'artist']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('songs/create') }}"> Registrar nueva canción </a>
                    </li>
                    @endif
                </ul>
            </div>

        </nav>
        <div class="container mt-3">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($songs as $song)
                    @guest

                        <div class="col">

                            <div class="card">
                                <div class="card-block">
                                    <img src="{{ asset($song->foto) }}" class="card-img-top mh-100" style="height: 300px;"
                                        alt="...">
                                    <div class="card-body ">
                                        <h5 class="card-title">Titulo: {{ $song->titulo }}</h5>
                                        <p class="card-text">Duración: {{ $song->duracion }}</p>
                                        <p class="card-text">Genero : {{ $song->genre->nombre_genero ?? '' }}</p>
                                        <p class="card-text">Album : {{ $song->album->nombre_album ?? '' }}</p>
                                        <p class="card-text">País : {{ $song->location->nombre_pais ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                    @Auth
                        @if ($song->restriccion_edad == '0' || @Auth::user()->getAge() >= 18 || @Auth::user()->hasRole('admin'))
                            <div class="col">

                                <div class="card">
                                    <div class="card-block">
                                        <img src="{{ asset($song->foto) }}" class="card-img-top mh-100"
                                            style="height: 300px;" alt="...">
                                        <div class="card-body ">
                                            <h5 class="card-title">Titulo: {{ $song->titulo }}</h5>
                                            <p class="card-text">Duración: {{ $song->duracion }}</p>
                                            <p class="card-text">Genero : {{ $song->genre->nombre_genero ?? '' }}</p>
                                            <p class="card-text">Album : {{ $song->album->nombre_album ?? '' }}</p>
                                            <p class="card-text">País : {{ $song->location->nombre_pais ?? '' }}</p>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto mb-3">
                                            @if (@Auth::user()->suscripcion)
                                                <audio controls id="music">
                                                    <source src="{{ asset($song->url_cancion) }}" type="audio/mpeg">
                                                </audio>
                                            @endif

                                            @if (@Auth::user()->hasRole(['admin', 'artist']))
                                                <a class="btn btn-primary btn-lg btn-warning" role="button"
                                                    href=" {{ url('/songs/' . $song->id . '/edit') }}">Editar</a>
                                            @endif
                                            @if (@Auth::user()->hasRole('admin'))
                                                <div class="d-flex justify-content-center">
                                                    <form action="{{ url('/songs/' . $song->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input class="btn btn-primary btn-lg btn-danger " type="submit"
                                                            onclick="return confirm('¿Seguro que deseas borrar?')"
                                                            value="Borrar">
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endauth
                @endforeach

            </div>
        </div>
        </div>
    </body>
    </div>
@endsection
