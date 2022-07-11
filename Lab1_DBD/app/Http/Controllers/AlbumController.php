<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        if ($albums->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encontro el album',
            ]);
        }
        return response($albums, 200);
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
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_album' => 'required|min:2|max:50',
                'duracion' => 'required',
                'id_user' => 'required'
            ],
            [
                'nombre_album.required' => 'Debe ingresar un nombre de album',
                'nombre_album.min' => 'El nombre del album debe tener un largo minimo de 2',
                'nombre_album.max' => 'El nombre del album debe tener menos de 50',
                'duracion.required' => 'Debe ingresar una duracion',
                'id_user.required;'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newAlbum = new Album();
        $newAlbum->nombre_album = $request->nombre_album;
        $newAlbum->duracion = $request->duracion;
        $newAlbum->id_user = $request->id_user;

        $newAlbum->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo album',
            'id' => $newAlbum->id
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
        $album = Album::find($id);
        if (empty($album)) {
            return response()->json([
                'respuesta' => 'No se encontro el album',
            ]);
        }
        return response($album, 200);
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

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_album' => 'required|min:2|max:50',
                'duracion' => 'required',
            ],
            [
                'nombre_album.required' => 'Debe ingresar un nombre',
                'nombre_album.min' => 'El nombre debe tener un largo minimo de 2',
                'nombre_album.max' => 'El nombre debe tener menos de 50',
                'duracion.required' => 'Ingrese duracion de cancion'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $album = Album::find($id);
        if (empty($album)) {
            return response()->json(['Album no válido.']);
        }
        $album->nombre_album = $request->nombre_album;
        $album->duracion = $request->duracion;
        $album->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el album',
            'id' => $album->id
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $albums = Album::find($id);
        if (empty($albums)) {
            return response()->json([]);
        }
        $albums->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el album.',
            'id' => $albums->id,
            'Nombre' => $albums->nombre_album,
            'duracion' => $albums->duracion,
            'id_user' => $albums->id_user
        ], 200);
    }

    public function restore($id)
    {
        $albums = Album::onlyTrashed()->find($id);
        if (empty($albums)) {
            return response()->json(['El usuario no ha sido desactivado con anterioridad.']);
        }
        $albums->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el album.',
            'id' => $albums->id,
            'Nombre' => $albums->nombre_album,
            'duracion' => $albums->duracion,
            'id_user' => $albums->id_user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
