<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Location::all();
        if ($data->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran ubicaciones en el sistema.',
            ]);
        }
        return response($data, 200);
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
            $request->all(),[
                'nombre_pais'=>'required|min:2|max:20'
            ],[
                'nombre_pais.required' => 'Debes ingresar un nombre',
                'nombre_pais.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_pais.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newSubject = new Location();
        $newSubject->nombre_pais = $request->nombre_pais;
        $newSubject->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva locacion.',
            'id' => $newSubject->id
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
        $subject = Location::find($id);
        if(empty($subject)){
            return response()->json('La locacion ingresada no existe.');
        }
        return response($subject);
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
            $request->all(),[
                'nombre_pais'=>'required|min:2|max:50'
            ],[
                'nombre_pais.required' => 'Debes ingresar un nombre',
                'nombre_pais.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_pais.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
            if ($validator->fails()) {
                return response($validator->errors());
            }
            $subject = Location::find($id);
            if(empty($subject)){
                return response()->json([]);
            }
            $subject->nombre_pais = $request->nombre_pais;
            $subject->save();
            return response()->json([
                'respuesta' => 'Se ha modificado una locacion.',
                'id' => $subject->id
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
        $subject = Location::find($id);
        if(empty($subject)){
            return response()->json([]);
        }
        $subject->delete();
        return response()->json([
            'respuesta' => 'Se ha eliminado la locacion.',
        ], 200);
    }
}