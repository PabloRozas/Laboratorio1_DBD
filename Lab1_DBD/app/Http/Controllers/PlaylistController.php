<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $playlist = Playlist::all();
        if($playlist->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran los Playlist',
            ]);
            return response($playlist, 200);
        }
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
                'Nombre' => 'required|min:4|max:30|unique:users,name',
                'duracion' => 'required',
                'id_user' => 'required',
            ],
            [
                'Nombre.required' => 'Debes ingresar un nombre',
                'Nombre.min' => 'El nombre debe ser de largo mínimo :min',
                'Nombre.max' => 'El nombre debe ser de largo máximo :max',
                'duracion.required' => 'Debe ingresar una duración',
                'id_user' => 'Debe ingresar un id de usuario'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $playlist = new Playlist;
        $playlist->Nombre = $request->Nombre;            
        $playlist->duracion = $request->duracion;    
        $playlist->id_user = $request->id_user;          
        $playlist->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva Playlist',
            'id' => $playlist->id,
            'Nombre' => $playlist->Nombre,
            'Duracion' => $playlist->duracion,
            'id de usuario' => $playlist->id_user
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
                'Nombre' => 'required|min:4|max:30|unique:users,name',
                'duracion' => 'required',
                'id_user' => 'required',
            ],
            [
                'Nombre.required' => 'Debes ingresar un nombre',
                'Nombre.min' => 'El nombre debe ser de largo mínimo :min',
                'Nombre.max' => 'El nombre debe ser de largo máximo :max',
                'duracion.required' => 'Debe ingresar una duración',
                'id_user' => 'Debe ingresar un id de usuario'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $playlist = Playlist::find($id);
        if (empty($playlist)){
            return response()->json(['Playlist no valida']);
        }
        $playlist->Nombre = $request->Nombre;
        $playlist->duracion = $request->duracion;    
        $playlist->id_user = $request->id_user;          
        $playlist->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva Playlist',
            'id' => $playlist->id,
            'Nombre' => $playlist->Nombre,
            'Duracion' => $playlist->duracion,
            'id de usuario' => $playlist->id_user
        ], 200);
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([]);
        }
        $playlist->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado la Playlist',
            'id' => $playlist->id,
            'Nombre' => $playlist->Nombre,
        ],200);
    }
}
