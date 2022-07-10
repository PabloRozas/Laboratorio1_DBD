@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Crear Usuario')

@section('contenido')
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
        <x-user-for-body/>
    </form>

    @yield('validator')
    
</div>
@endsection