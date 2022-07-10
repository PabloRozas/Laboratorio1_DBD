<div>
    @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Nombre" >
            <label for="name">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" placeholder="Username" >
            <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
            <label for="email">Email</label>
        </div>
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
                placeholder="Fecha de nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
            <label for="birthdate">Fecha de nacimiento</label>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
</div>