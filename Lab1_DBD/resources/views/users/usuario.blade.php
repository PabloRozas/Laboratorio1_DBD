
@extends('layouts.app')
@section('content')
<div class="container">

    <div>
        <ol>
        <h2>MI PERFIL</h2>
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
            <a class="btn btn-primary" aria-current="page" href="{{ url('/users/'.Auth::user()->id.'/edit') }}">Editar Perfil</a>
        </ol>


    </div>
</div>
@endsection
