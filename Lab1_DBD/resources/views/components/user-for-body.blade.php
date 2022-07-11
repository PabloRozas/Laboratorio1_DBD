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