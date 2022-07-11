@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Editar Usuario')

@section('contenido')
<div class="container">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @method('PUT')
        <div>
            @csrf
            <x-user-for-body :user="$user"/>
                
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento"
                        placeholder="Fecha de nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
                    <label for="birthdate">Fecha de nacimiento</label>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
        </div>
        
    </form>

    @yield('validator')
    
</div>
@endsection