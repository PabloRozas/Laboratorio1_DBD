@extends('admin.layout')
@section('title', 'Usuario')
@section('vista', 'Ver Usuario')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->fecha_nacimiento }}">
                                </div>
                            </div>
                        </div>
                        @if (empty($user->roles()->pluck('name')->first()))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <input type="text" class="form-control" disabled value="No tiene rol">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <input type="text" class="form-control" disabled value="{{ $user->roles()->pluck('name')->first() }}">
                                    </div>
                                </div>
                            </div>
                            
                        @endif
                      
                        @if ($user->suscripcion == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Suscripcion</label>
                                        <input type="text" class="form-control" disabled value="Suscrito">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Suscripcion</label>
                                        <input type="text" class="form-control" disabled value="No suscrito">
                                    </div>
                                </div>
                            </div>
                        @endif
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de creación</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->created_at }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha de actualización</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->updated_at }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection