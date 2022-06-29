Formulario de subida de una canción
<form action="{{ url('/songs') }}" method="post" enctype="multipart/form-data">
@csrf

<label for="titulo"> Titulo canción </label>
<input type="text" name="titulo" id="titulo">
<br>

<label for="duracion"> Duración </label>
<input type="text" name="duracion" value="00:00:00" id="duracion"> 
<br>

<label for="restriccion_edad"> Restricción de edad </label>
<select type="text" name="restriccion_edad" id="restriccion_edad">
<option>false</option>
<option>true</option>
</select> <br>

<label for="fecha_creacion"> Fecha de creación </label>
<input type="date" name="fecha_creacion" value="2022-12-31" id="fecha_creacion">
<br>

<label for="id_genero"> Género </label>
<input type="text" name="id_genero" id="id_genero">
<br>

<label for="id_pais"> País </label>
<input type="text" name="id_pais" id="id_pais">
<br>

<label for="id_album"> Albúm </label>
<input type="text" name="id_album" id="id_album">
<br>

<label for="foto"> Foto </label>
<input type="file" name="foto" id="foto">
<br>

<input type="submit" name="Enviar" id="Enviar">
<br>

</form>







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