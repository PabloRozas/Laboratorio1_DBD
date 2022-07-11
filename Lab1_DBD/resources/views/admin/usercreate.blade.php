@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Crear Usuario')

@section('contenido')
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
        
        <div>
            @csrf
            <x-user-for-body/>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirmar Password">
                    <label for="password_confirmation">Confirmar Password</label>
                </div>
                <!--Ingresar fecha de nacimiento-->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="birthdate" name="fecha_nacimiento"
                        placeholder="Fecha de nacimiento" value="{{ old('fecha_nacimiento') }}">
                    <label for="birthdate">Fecha de nacimiento</label>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>

    @yield('validator')
    
</div>
@endsection