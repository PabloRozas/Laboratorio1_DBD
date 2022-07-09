<!DOCTYPE html>
<html lang="es">
<!-- lenguaje en español -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Administrador</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/songs">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Vistas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Usuarios</a></li>
                                <li><a class="dropdown-item" href="#">Artistas</a></li>
                                <li><a class="dropdown-item" href="#">Albums</a></li>
                                <li><a class="dropdown-item" href="#">Canciones</a></li>
                                <li><a class="dropdown-item" href="#">Generos</a></li>
                                <li><a class="dropdown-item" href="#">Playlists</a></li>
                                <li><a class="dropdown-item" href="#">Metodos de Pago</a></li>
                                <li><a class="dropdown-item" href="#">Categorias</a></li>
                                <li><a class="dropdown-item" href="#">Valoraciones</a></li>
                                <li><a class="dropdown-item" href="#">Ubicaciones</a></li>
                                <li><a class="dropdown-item" href="#">Permisos</a></li>
                                <li><a class="dropdown-item" href="#">Roles</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Agregar Usuario</a>

                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar por ID" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Suscripción</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->suscripcion == 1)
                    <td>✓</td>
                    @else
                    <td>X</td>
                    @endif


                    @if ($user->roles()->pluck('name')->first() == 'admin' and $user->id != 1)
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="" {{ action('UserController@updateRol',
                                        ['request'=>1,'id'=>$user->id]) }}>Admin</a></li>
                                <li><a class="dropdown-item" href="#">User</a></li>
                                <li><a class="dropdown-item" href="#">Artist</a></li>
                            </ul>
                        </div>
                    </td>
                    @elseif ($user->roles()->pluck('name')->first() == 'user')
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </button>
                            <ul class="dropdown-menu">
                                @method('PUT')
                                <li><a class="dropdown-item"
                                        href="{{action('UserController@updateRol', ['id' => $user->id])}}"
                                        aria-valuenow="1">Admin</a></li>
                                <li><a class="dropdown-item" href="#">User</a></li>
                                <li><a class="dropdown-item" href="#">Artist</a></li>

                            </ul>
                        </div>
                    </td>
                    @elseif ($user->roles()->pluck('name')->first() == 'artist')
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Artist
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href=" ">Admin</a></li>
                                <li><a class="dropdown-item" href="#">User</a></li>
                                <li><a class="dropdown-item" href="#">Artist</a></li>
                            </ul>
                        </div>
                    </td>
                    @elseif ($user->roles()->pluck('name')->first() == 'admin' and $user->id == 1)
                    <td>Admin</td>
                    @else
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                No tiene Rol
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">User</a></li>
                                <li><a class="dropdown-item" href="#">Artist</a></li>
                            </ul>
                        </div>
                    </td>
                    @endif


                    @if ($user->suscripcion == 1)
                        <td>Suscrito</td>
                    @else
                        <td>No Suscrito</td>
                    @endif
                    <td>
                    <a class="btn btn-secondary" href=" {{ url('/users/'.$user->id.'/edit') }}">Editar</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>