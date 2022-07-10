@extends('layouts.app')
@section('content')
    <div class="container">

        <div>
            <ol>
                <h2>Mi Perfil</h2>
                <ul class="list-group list-group-horizontal ">
                    <li class="list-group-item flex-fill "> Mi nombre: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->name }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Nombre de Usuario: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->username }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Correo Electronico: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->email }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Mi edad: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->getAge() }} </li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Fecha de nacimiento: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->fecha_nacimiento }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Cuenta creada en : </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->created_at }}</li>
                </ul>
                @if (Auth::user()->num_tarjeta != null)
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item flex-fill "> Tarjeta Asociada : </li>
                        <li class="list-group-item flex-fill ">{{ Auth::user()->num_tarjeta }}</li>
                    </ul>
                @endif

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Mi rol: </li>
                    <li class="list-group-item flex-fill ">{{ Auth::user()->roles->pluck('name')->first() }}</li>
                </ul>

                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item flex-fill "> Estado Subscripcion: </li>
                    <li class="list-group-item flex-fill">
                        @if (Auth::user()->suscripcion == 1)
                            Subscrito
                        @else
                            No subscrito
                        @endif
                    </li>
                </ul>
                <div class= mt-5>
                     <a class="btn btn-primary" aria-current="page"
                        href="{{ url('/users/' . Auth::user()->id . '/edit') }}">Editar
                        Perfil</a>
                </div>

            </ol>


        </div>
    </div>
@endsection
