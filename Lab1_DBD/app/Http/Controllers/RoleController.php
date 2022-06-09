<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        if ($data->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran Roles en el sistema.',
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
                'nombre_rol'=>'required|min:2|max:50'
            ],[
                'nombre_rol.required' => 'Debes ingresar un nombre',
                'nombre_rol.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_rol.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newSubject = new Role();
        $newSubject->nombre_rol = $request->nombre_rol;
        $newSubject->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo rol.',
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
        $subject = Role::find($id);
        if(empty($subject)){
            return response()->json('El Rol ingresado no existe.');
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
                'nombre_rol'=>'required|min:2|max:50'
            ],[
                'nombre_rol.required' => 'Debes ingresar un nombre',
                'nombre_rol.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre_rol.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
            if ($validator->fails()) {
                return response($validator->errors());
            }
            $subject = Role::find($id);
            if(empty($subject)){
                return response()->json([]);
            }
            $subject->nombre_rol = $request->nombre_rol;
            $subject->save();
            return response()->json([
                'respuesta' => 'Se ha modificado un nuevo rol.',
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
        $subject = Role::find($id);
        if(empty($subject)){
            return response()->json([]);
        }
        $subject->delete();
        return response()->json([
            'respuesta' => 'Se ha eliminado el rol.',
        ], 200);
    }
}
