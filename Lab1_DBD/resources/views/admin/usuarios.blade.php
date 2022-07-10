@extends('admin.layout')
@section('title', 'Usuarios')
@section('vista', 'Usuarios')

@section('crear')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/admin/usercreate">Crear nuevo Usuario</a>
    </li>
@endsection


@section('buscar')

@endsection

@section('contenido')

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Suscripción</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)

        @if ($user->id == 1)
        <tr>
         <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            @if ($user->suscripcion == 1)
            <td>✓</td>
            @else
            <td>✗</td>
            @endif

            <td>Admin</td>
            <td></td>
            <td></td>
        </tr>
        
            
        @else
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            @if ($user->suscripcion == 1)
            <td>✓</td>
            @else
            <td>✗</td>
            @endif
            @if ($user->roles()->pluck('name')->first() == 'admin')
            <td>Admin</td>
            @elseif ($user->roles()->pluck('name')->first() == 'user')
            <td>User</td>
            @elseif ($user->roles()->pluck('name')->first() == 'artist')
            <td>Artista</td>
            @else
            <td>No definido</td>
            @endif
            <td>
                {{-- Boton ver --}}
                <a href="{{ route('users.show', $user) }}" class="btn btn-outline-primary">Ver</a>
                {{-- Boton editar --}}
                <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                </form>
            </td>
            
            
        </tr>
        @endif       

        @endforeach
    </tbody>
</table>
@endsection