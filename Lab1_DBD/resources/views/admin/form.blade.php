<h1>{{$modo}} Usuario</h1>

<br>
<label for="username"> Nombre de Usuario </label>
<input type="text" name="username" value="{{ isset($users->username)?$users->username:'' }}"  id="username">
<br>

<label for="name"> Nombre </label>
<input type="text" name="name" value="{{ isset($users->name)?$users->name:'' }}"  id="name">
<br>

<label for="email"> Correo </label>
<input type="text" name="email" value="{{ isset($users->email)?$users->email:'' }}" id="email">
<br>

<label for="password"> Contraseña </label>
<input type="text" name="password" value="{{ isset($users->password)?$users->password:'' }}" id="password">
<br>


<label for="fecha_nacimiento"> Fecha de nacimiento </label>
<input type="date" name="fecha_nacimiento" value="{{ isset($users->fecha_nacimiento)?$users->fecha_nacimiento:'' }}" id="fecha_nacimiento">
<br>

<label for="num_tarjeta"> Numero Tarjeta </label>
<input type="text" name="num_tarjeta" value="{{ isset($users->num_tarjeta)?$users->num_tarjeta:'' }}" id="num_tarjeta">
<br>


<input class="btn btn-success" type="submit" value="{{$modo}} datos">

@if (@Auth::user()->hasRole('admin'))
<a class="btn btn-secondary" href="/usuario"  > Cancelar </a>
<a class="btn btn-warning" href="{{ url('users') }}"  > Volver </a>
@else
<a class="btn btn-warning" href="/usuario"  > Volver </a>
@endif