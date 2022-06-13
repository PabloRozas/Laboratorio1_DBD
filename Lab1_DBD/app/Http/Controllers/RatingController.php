<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ratings =  Rating::all();
        if($ratings->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran calificaciones',
            ]);
        }
        return response($ratings,200);
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
                'comentario' => 'required|min:2|max:200',
                'num_puntaje' => 'required',
                'id_user' => 'required',
                'id_cancion' => 'required',
            ],
            [
                'comentario.required' => 'Debes ingresar un comentario.',
                'comentario.min' => 'El comentario debe tener al menos 2 caracteres.',
                'comentario.max' => 'El comentario excede el máximo de caracteres.',
                'num_puntaje.required' => 'Debe ingresar un puntaje',
                'id_user.required',
                'id_cancion.required',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newRating = new Rating();
        $newRating->comentario = $request->comentario;
        $newRating->num_puntaje = $request->num_puntaje;
        $newRating->id_user = $request->id_user;
        $newRating->id_cancion = $request->id_cancion;
        $newRating->save();
        return response()->json([
            'respuesta' => 'Se realizó correctamente el comentario.',
            'id' => $newRating->id
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
        $rating = Rating::find($id);
        if(empty($rating)){
            return response()->json([
                'respuesta' => 'No se encuentra calificación.',
            ]);
        }
        return response($rating);
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
    }
}
