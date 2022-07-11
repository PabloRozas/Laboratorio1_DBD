@extends('layouts.app')

@section('content')
<div class="container">
Formulario de subida de una canción
<form action="{{ url('/songs') }}" method="post" enctype="multipart/form-data">
@csrf




@include('songs.form',['modo'=>'Crear'])




</form>
</div>
@endsection






<!--
<label for="id_genero"> Género </label>
<select type="text" name="id_genero" id="id_genero">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select> <br>


<label for="id_pais"> País </label>
<select type="text" name="id_pais" id="id_pais">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select> <br>

<label for="id_album"> Albúm </label>
<select id="id_album">
<option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
</select> <br>
-->