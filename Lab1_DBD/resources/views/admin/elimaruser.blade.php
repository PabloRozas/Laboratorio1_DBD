@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Eliminar Usuario')

@section('contenido')

    <div class="container">
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @method('DELETE')
            @csrf
            <div>
                <x-user-for-body :user="$user"/>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
       
    </div>

@endsection
