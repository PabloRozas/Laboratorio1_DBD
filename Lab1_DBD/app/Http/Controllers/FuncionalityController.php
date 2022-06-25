<?php

namespace App\Http\Controllers;

use App\Models\Functionality;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FuncionalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $functionalities = Functionality::all();
        if ($functionalities->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran funcionalidades',
            ]);
        }
        return response($functionalities,200);
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
        //funcion que agrega un dato que se recibe
        $validator = Validator::make(
            $request->all(),[
                'nombre_fun' => 'required|min:2|max:30'
            ],
            [
                'nombre_fun.required' => 'Debes ingresar un nombre',
                'nombre_fun.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_fun.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $functionality = new Functionality();
        $functionality->nombre_fun = $request->nombre_fun;
        $functionality->save();


        return response()->json([
            'respuesta' => 'Funcionalidad agregada correctamente',
            'id' => $functionality->id
        ]);
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
        $functionality = Functionality::find($id);
        if (!$functionality){
            return response()->json([
                'respuesta' => 'No se encuentra la funcionalidad',
            ]);
        }
        return response($functionality,200);
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
        //funcion que actualiza un dato que se recibe
        $validator = Validator::make(
            $request->all(),[
                'nombre_fun' => 'required|min:2|max:30'
            ],
            [
                'nombre_fun.required' => 'Debes ingresar un nombre',
                'nombre_fun.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_fun.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $functionality = Functionality::find($id);
        if (empty($functionality)){
            return response()->json([
                'respuesta' => 'No se encuentra la funcionalidad',
            ]);
        }
        $functionality->nombre_fun = $request->nombre_fun;
        $functionality->save();
        return response()->json([
            'respuesta' => 'Funcionalidad actualizada correctamente',
            'id' => $functionality->id
        ]);

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
        $functionality = Functionality::find($id);
        if ($functionality == null){
            return response()->json([
                'respuesta' => 'No se encuentra la funcionalidad',
            ]);
        }
        $functionality->delete();
        return response()->json([
            'respuesta' => 'Funcionalidad eliminada',
        ]);
    }

    //funcion que restaura un dato que se recibe
    public function restore($id)
    {
        $functionality = Functionality::withTrashed()->find($id);
        if ($functionality == null){
            return response()->json([
                'respuesta' => 'No se encuentra la funcionalidad',
            ]);
        }
        $functionality->restore();
        return response()->json([
            'respuesta' => 'Funcionalidad restaurada',
            'id' => $functionality->id
        ]);
    }
}
