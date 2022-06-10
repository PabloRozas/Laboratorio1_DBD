<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Matcher\Subset;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        if ($genres->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran generos',
            ]);
        }
        return response($genres, 200);
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
                'nombre_genero' => 'required|min:2|max:50'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'nombre_genero.min' => 'El nombre debe tener un largo minimo de 2',
                'nombre_genero.max' => 'El nombre debe tener menos de 50',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newGenre = new Genre();
        $newGenre->nombre_genero = $request->nombre_genero;
        $newGenre->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo genero',
            'id' => $newGenre->id
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
        $genres = Genre::find($id);
        if (empty($genre)) {
            return response()->json([]);
        }
        return response($genres, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
                'nombre_genero' => 'required|min:2|max:50'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'nombre_genero.min' => 'El nombre debe tener un largo minimo de 2',
                'nombre_genero.max' => 'El nombre debe tener menos de 50',
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newGenre = new Genre();
        $newGenre->name = $request->name;
        $newGenre->save();
        $genres = Genre::find($id);
        if (empty($genres)) {
            return response()->json([]);
        }
        $genres->nombre_genero = $request->nombre_genero;
        return response()->json([
            'respuesta' => 'Se ha modificado un nuevo subject',
            'id' => $newGenre->id
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
        $genres = Genre::find($id);
        if (empty($genres)) {
            return response()->json([]);
        }
        $genres->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el genero',
            'id' => $genres->id,
            'nombre_genero' => $genres->nombre_genero,
        ], 200);
    }

    public function restore($id)
    {
        $genres = Genre::onlyTrashed()->find($id);
        if (empty($genres)) {
            return response()->json([]);
        }
        $genres->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el genero',
            'id' => $genres->id,
            'nombre_genero' => $genres->nombre_genero,
        ], 200);
    }
}
