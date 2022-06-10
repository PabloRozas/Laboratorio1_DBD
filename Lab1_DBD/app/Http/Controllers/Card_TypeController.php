<?php

namespace App\Http\Controllers;

use App\Models\Card_Type;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Card_TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card_types = Card_Type::all();
        if ($card_types->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran subjects',
            ]);
        }
        return response($card_types, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                'nombre_tipo' => 'required|min:2|max:50'

            ],
            [
                'nombre_tipo.required' => 'Debe ingresar un nombre',
                'nombre_tipo.min' => 'El nombre debe tener un largo minimo de 2',
                'nombre_tipo.max' => 'El nombre debe tener menos de 50',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newCard_Type = new Card_Type();
        $newCard_Type->nombre_tipo = $request->nombre_tipo;
        $newCard_Type->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo tipo de tarjeta',
            'id' => $newCard_Type->id
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

        $card_types = Card_Type::find($id);
        if (empty($card_types)) {
            return response()->json([]);
        }
        return response($card_types, 200);
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
                'nombre_tipo' => 'required|min:2|max:50'

            ],
            [
                'nombre_tipo.required' => 'Debe ingresar un nombre',
                'nombre_tipo.min' => 'El nombre debe tener un largo minimo de 2',
                'nombre_tipo.max' => 'El nombre debe tener menos de 50',
            ]
        );

        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newCard_Type = new Card_Type();
        $newCard_Type->name = $request->name;
        $newCard_Type->save();
        $card_types = Card_Type::find($id);
        if (empty($card_types)) {
            return response()->json([]);
        }
        $card_types->nombre_tipo = $request->nombre_tipo;
        return response()->json([
            'respuesta' => 'Se ha modificado el tipo de tarjeta',
            'id' => $newCard_Type->id
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
        $card_types = Card_Type::find($id);
        if (empty($card_types)) {
            return response()->json([]);
        }
        $card_types->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el tipo de tarjeta',
            'id' => $card_types->id,
            'nombre_genero' => $card_types->nombre_tipo,
        ], 200);
    }

    public function restore($id)
    {
        $card_type = Card_Type::onlyTrashed()->find($id);
        if (empty($card_type)) {
            return response()->json([]);
        }
        $card_type->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el tipo de tarjeta',
            'id' => $card_type->id,
            'nombre_genero' => $card_type->nombre_tipo,
        ], 200);
    }
}
