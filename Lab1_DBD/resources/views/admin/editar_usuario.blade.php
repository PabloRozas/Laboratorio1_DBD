@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Editar Usuario')

@section('contenido')
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
        <x-user-for-body :user="$user"/>
    </form>

    @yield('validator')
    
</div>
@endsection