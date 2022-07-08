
@extends('layouts.main')

@section('content')



<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mi perfil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>

        </nav>
    </header>
    <div>
        <ol>
            <li>{{Auth::user()->name}}</li>
            <li>{{Auth::user()->username}}</li>
            <li>{{Auth::user()->email}}</li>
            <li>{{Auth::user()->getAge()}} </li>
            <li>{{Auth::user()->fecha_nacimiento}}</li>
            <li>{{Auth::user()->created_at}}</li>
            @if (Auth::user()->num_tarjeta != null)
            <li>{{Auth::user()->num_tarjeta}}</li>
            @endif

            <li>{{Auth::user()->roles->pluck('name')->first()}}</li>
            <li>@if (Auth::user()->suscripcion == 1)
                    'Subscrito'
                    @else
                    'No subscrito'
                    @endif
            </li>
        </ol>


    </div>
    </section>
