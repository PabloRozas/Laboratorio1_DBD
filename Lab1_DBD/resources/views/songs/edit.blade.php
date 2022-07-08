@extends('layouts.app')

@section('content')
<div class="container">
Formulario de edición de Canción
<form action="{{url('/songs/'.$songs->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}



@include('songs.form',['modo'=>'Editar'])



</form>

</div>
@endsection