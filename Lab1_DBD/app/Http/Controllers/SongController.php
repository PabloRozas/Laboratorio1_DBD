<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $songs = Song::all();
        if ($songs->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran canciones',
            ]);
        }
        return response($songs, 200);

        */
        $songs['songs']= Song::paginate(25);
        return view('songs.index',$songs);
    }

    public function filter(Request $request)
    {
        $songs = Song::query();
        $genres = Genre::query();
        $titulo = $request->titulo;
        $restriccion_edad = $request->restriccion_edad;
        $nombre_genero = $request->nombre_genero;
        // $username = $request->username;
        // $age = $request->age;

        if ($titulo) {
            $songs->where('titulo','LIKE','%'.$titulo.'%');
        }
         if ($restriccion_edad) {
             $songs->where('restriccion_edad','LIKE','%'.$restriccion_edad.'%');
         }

         if ($nombre_genero) {
            $id_genres = $genres->where('nombre_genero','LIKE','%'.$nombre_genero.'%')->pluck('id');
            $songs->where('id_genero', $id_genres);

         }

        $data = [
            'titulo' => $titulo,
            'restriccion_edad' => $restriccion_edad,
            'genero' => $nombre_genero,
            'songs' => $songs->paginate(25),
        ];

        return view('songs.index',$data);
    }
    public function masReproducidos(){
        $songs = Song::orderBy('reproducciones', 'desc')->paginate(10);
        return view('songs.index',['songs'=>$songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'titulo' => 'required|min:2|max:200',
                'duracion' => 'required',
                'id_genero' => 'required',
                'id_pais' => 'required',
                'restriccion_edad' => 'required',
                'fecha_creacion' => 'required'
            ],
            [
                'titulo.required' => 'Debes ingresar un título.',
                'titulo.min' => 'El título debe tener al menos 2 caracteres.',
                'titulo.max' => 'El título exce el máximo de caracteres.',
                'duracion.required' => 'Debe ingresar una duracion',
                'id_genero.required',
                'id_pais.required',
                'restriccion_edad.required',
                'fecha_creacion.required',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newSong = new Song();
        $newSong->titulo = $request->titulo;
        $newSong->duracion = $request->duracion;
        $newSong->id_genero = $request->id_genero;
        $newSong->id_pais = $request->id_pais;
        $newSong->id_album = $request->id_album;
        $newSong->restriccion_edad = $request->restriccion_edad;
        $newSong->fecha_creacion = $request->fecha_creacion;
        $newSong->url_cancion = $request->url_cancion;
        $newSong->reproducciones = 0;
        $newSong->foto = $request->foto;
        //if($request->hasFile('foto')){
            //$newSong['foto']=$request->file('foto')->store('uploads','public');
        //}
        $newSong->save();

        return redirect('songs')->with('mensaje','Nueva canción agregada.');
        /*return response()->json([
            'respuesta' => 'Se ha creado una nueva cancion',
            'id' => $newSong->id
        ], 201);*/
/*
        $id_buscada = $request->id_usuario;
        $boolean = Authentication::find($id_buscada);
        if(not(empty($boolean))){
            return response()->json([
                'respuesta' => 'No se encuentra autenticacion',
            ]);
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $song = Song::find($id);
        if (empty($song)) {
            return response()->json([
                'respuesta' => 'No se encuentra canción',
            ]);
        }
        return response($song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $songs=Song::findOrFail($id);
        return view('songs.edit', compact('songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosSong = request()->except(['_token','_method']);

        // if($request->hasFile('foto')){
        //     $songs=Song::findOrFail($id);
        //     Storage::delete('public/'.$songs->foto);
        //     $datosSong['foto']=$request->file('foto')->store('uploads','public');
        // }

        Song::where('id','=',$id)->update($datosSong);

        $songs=Song::findOrFail($id);
        return view('songs.edit', compact('songs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $song=Song::findOrFail($id);
        if(Storage::delete('public/'.$song->foto)){
            Song::destroy($id);
        }

        return redirect('songs')->with('mensaje','Canción borrada.');
    }
}
