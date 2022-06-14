<?php

namespace App\Http\Controllers;

use App\Models\FunctionalityRole;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FunctionalityRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $functionalityrole = FunctionalityRole::all();
        if ($functionalityrole->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran relaciones entre funcionalidad-rol',
            ]);
        }
        return response($functionalityrole, 200);
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
                'id_funcion' => 'required',
                'id_rol' => 'required'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'id_funcion.required' => 'Debe ingresar la funcion asociada',
                'id_rol.required' => 'debe ingresar el rol asociado'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newfuncrole = new FunctionalityRole();
        $newfuncrole->id_funcion = $request->id_funcion;
        $newfuncrole->id_rol = $request->id_rol;
        $newfuncrole->save();
        return response()->json([
            'respuesta' => 'Se ha creado una nueva relacion',
            'id' => $newfuncrole->id
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
        $funcrole = FunctionalityRole::find($id);
        if (empty($funcrole)) {
            return response()->json('No existe esta relacion');
        }
        return response($funcrole);
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
                'id_funcion' => 'required',
                'id_rol' => 'required'

            ],
            [
                'nombre_genero.required' => 'Debe ingresar un nombre',
                'id_funcion.required' => 'Debe ingresar la funcion asociada',
                'id_rol.required' => 'debe ingresar el rol asociado'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newfuncrole = FunctionalityRole::find($id);
        if (empty($newfuncrole)) {
            return response()->json(['id no valido']);
        }
        // $newfuncrole = new FunctionalityRole();
        $newfuncrole->id_funcion = $request->id_funcion;
        $newfuncrole->id_rol = $request->id_rol;
        $newfuncrole->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la relacion',
            'id' => $newfuncrole->id
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
        $newfuncrole = FunctionalityRole::find($id);
        if (empty($newfuncrole)) {
            return response()->json([]);
        }
        $newfuncrole->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado la relacion',
            'id' => $newfuncrole->id,
        ], 200);
    }

    public function restore($id)
    {
        $newfuncrole = FunctionalityRole::onlyTrashed($id);
        if (empty($newfuncrole)) {
            return response()->json(['No se han desactivado relaciones']);
        }
        $newfuncrole->restore();
        return response()->json([
            'respuesta' => 'Se ha desactivado la relacion',
            'id' => $newfuncrole->id,
        ], 200);
    }
}
