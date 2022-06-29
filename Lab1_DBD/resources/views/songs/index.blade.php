Mostrar lista de Canciones

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

<a href="{{ url('songs/create') }}"> Registrar nueva canción </a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Duracion</th>
            <th>Foto</th>
            <th>Restriccion Edad</th>
            <th>Reproducciones</th>
            <th>Fecha Creacion</th>
            <th>Pais</th>
            <th>Genero</th>
            <th>Album</th>
        </tr>
    </thead>


    <tbody>
        @foreach($songs as $song)
        <tr>
            <td>{{ $song->id }}</td>
            <td>{{ $song->titulo }}</td>
            <td>{{ $song->duracion }}</td>
            <td> <img src="{{ asset('storage'.'/'.$song->foto) }}" width="100" alt =""> </td>
            <td>{{ $song->restriccion_edad }}</td>
            <td>{{ $song->reproducciones }}</td>
            <td>{{ $song->fecha_creacion }}</td>
            <td>{{ $song->id_genero }}</td>
            <td>{{ $song->id_pais }}</td>
            <td>{{ $song->id_album }}</td>
            <td> 
            
            <a href=" {{ url('/songs/'.$song->id.'/edit') }}">
                Editar 
            </a>
                

            <form action="{{url('/songs/'.$song->id)}}" method="post">
            @csrf    
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Seguro que deseas borrar?')" 
                value="Borrar">
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>