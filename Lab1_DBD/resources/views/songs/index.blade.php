@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
@extends('layouts.main')
@section('content')

    <body>

        {{-- Grid art --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class=" ms-2 navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                        @if (@Auth::user()->hasRole(['admin', 'artist']))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('songs/create') }}"> Registrar nueva canción </a>
                            </li>
                        @endif
                    @endif
                </ul>
                <div class="card-body">
                    <form action="{{ route('songs.filter') }}" method="GET">
                        <div class="row">
                            <div class="col-xl-3">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control" value="{{ $titulo ?? '' }}">
                            </div>
                            <div class="col-xl-12 text-right mt-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
                {{-- <div class="input-group w-25 ms-auto me-5 justify-content-end ">
                    <form action="{{ route('songs.filter') }}" method="GET">
                        <input type="text" name="genre" class="form-control" aria-label="Text input with dropdown button" value="{{$genre ?? ''}}">

                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Dropdown</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </form>
                </div> --}}
            </div>
        </nav>
        <div class="container mt-3">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($songs as $song)
                    <div class="col">

                        <div class="card" >
                            <div class="card-block">
                            <img src="{{ asset($song->foto) }}" class="card-img-top mh-100" style="height: 300px;" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title">Titulo: {{ $song->titulo }}</h5>
                                <p class="card-text">Duración: {{ $song->duracion }}</p>
                                <p class="card-text">Genero : {{ $song->genre->nombre_genero ?? '' }}</p>
                                <p class="card-text">Album : {{ $song->album->nombre_album ?? '' }}</p>
                                <p class="card-text">País : {{ $song->location->nombre_pais ?? '' }}</p>
                            </div>
                            @Auth
                            <div class="d-grid gap-2 col-6 mx-auto mb-3">

                                <audio controls id="music">
                                    <source src="{{ asset($song->url_cancion) }}" type="audio/mpeg">
                                </audio>
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
                                            onclick="return confirm('¿Seguro que deseas borrar?')" value="Borrar">
                                    </form>
                                </div>
                                @endif
                            </div>
                            @endauth
                        </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </body>
    </div>
@endsection
