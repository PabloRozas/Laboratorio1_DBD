<?php

namespace App\Http\Controllers;

use App\Models\SongPlaylist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SongPlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songPlaylist = SongPlaylist::all();
        if ($songPlaylist->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentra la relacion song-playlist',
            ]);
        }
        return response($songPlaylist, 200);
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
                'id_song' => 'required',
                'id_playlist' => 'required'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'id_song.required' => 'Debe ingresar la song asociada',
                'id_playlist.required' => 'debe ingresar el playlist asociado'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $songPlaylist = new SongPlaylist();
        $songPlaylist->id_song = $request->id_song;
        $songPlaylist->id_playlist = $request->id_playlist;
        $songPlaylist->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva relacion',
            'id' => $songPlaylist->id
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

        $songPlaylist = SongPlaylist::find($id);
        if (empty($songPlaylist)) {
            return response()->json('No existe esta relacion');
        }
        return response($songPlaylist);
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
        $validator = Validator::make(
            $request->all(),
            [
                'id_song' => 'required',
                'id_playlist' => 'required'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'id_song.required' => 'Debe ingresar la song asociada',
                'id_playlist.required' => 'debe ingresar el playlist asociado'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $songPlaylist = SongPlaylist::find($id);
        if (empty($songPlaylist)) {
            return response()->json(['id no valido']);
        }
        // $songPlaylist = new FunctionalityPlayliste();
        $songPlaylist->id_song = $request->id_song;
        $songPlaylist->id_playlist = $request->id_playlist;
        $songPlaylist->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la relacion',
            'id' => $songPlaylist->id
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $songPlaylist = SongPlaylist::find($id);
        if (empty($songPlaylist)) {
            return response()->json([]);
        }
        $songPlaylist->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado la relacion',
            'id' => $songPlaylist->id,
        ], 200);
    }
    public function restore($id)
    {
        $songPlaylist = SongPlaylist::onlyTrashed($id);
        if (empty($songPlaylist)) {
            return response()->json(['No se han desactivado relaciones']);
        }
        $songPlaylist->restore();
        return response()->json([
            'respuesta' => 'Se ha desactivado la relacion',
            'id' => $songPlaylist->id,
        ], 200);
    }
}
