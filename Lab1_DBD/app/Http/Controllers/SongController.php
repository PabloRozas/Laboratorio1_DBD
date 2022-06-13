<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        if ($songs->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran canciones',
            ]);
        }
        return response($songs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'id_album' => 'required',
                'restriccion_edad' => 'required',
                'fecha_creacion' => 'required'
            ],
            [
                'titulo.required' => 'Debes ingresar un título.',
                'titulo.min' => 'El título debe tener al menos 2 caracteres.',
                'titulo.max' => 'El título excede el máximo de caracteres.',
                'duracion.required' => 'Debe ingresar una duracion',
                'id_genero.required',
                'id_pais.required',
                'id_album.required',
                'restriccion_edad.required',
                'fecha_creacion.required'
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
        $newSong->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva canción',
            'id' => $newSong->id
        ], 201);
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
        $validator = Validator::make(
            $request->all(),
            [
                'titulo' => 'required|min:2|max:200',
                'duracion' => 'required',
                'id_genero' => 'required',
                'id_pais' => 'required',
                'id_album' => 'required',
                'fecha_creacion' => 'required',
                'restriccion_edad' => 'required'

            ],
            [
                'titulo.required' => 'Debes ingresar un título.',
                'titulo.min' => 'El título debe tener al menos 2 caracteres.',
                'titulo.max' => 'El título excede el máximo de caracteres.',
                'duracion.required' => 'Debe ingresar una duracion',
                'id_genero.required',
                'id_pais.required',
                'fecha_creacion.required',
                'restriccion_edad.required'
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $song = Song::find($id);  

        if (empty($song)){
            return response()->json([
                'respuesta' => 'No se encuentra canción.',
            ]);
        }
        $song->titulo = $request->titulo;
        $song->duracion = $request->duracion;
        $song->id_genero = $request->id_genero;
        $song->id_pais = $request->id_pais;
        $song->id_album = $request->id_album;
        $song->fecha_creacion = $request->fecha_creacion;
        $song->restriccion_edad = $request->restriccion_edad;

        $song->save();

        return response()->json([
            'respuesta' => 'Se ha modificado la canción:',
            'id' => $song->id,
            'titulo' => $song->titulo
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        if (empty($song)) {
            return response()->json([
                'respuesta' => 'No se encuentra canción.',
            ]);
        }
        
        $song->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado la canción:',
            'id' => $song->id,
            'titulo' => $song->titulo
        ], 200);
    }
}
