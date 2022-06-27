<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class FollowupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $followups = Followup::all();
        if($followups->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran followups.',
            ]);
        }
        return response($followups,200);
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
                'id_user' => 'required',
            ],
            [
                'id_user.required' => 'Debe ingresar un usuario'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'respuesta' => 'Error',
                'errores' => $validator->errors()
            ]);
        }
        $followup = new Followup();
        $followup->id_user = $request->id_user;
        $followup->save();
        return response()->json([
            'respuesta' => 'Se ha realizado un follow',
            'followup' => $followup
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
        $followup = Followup::find($id);
        if(empty($followup)){
            return response()->json([
                'respuesta' => 'No se encuentra Follow.',
            ]);
        }
        return response($followup);
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
                'id_user' => 'required'
            ],
            [
                'id_user.required' => 'Debe ingresar un usuario'
            ]
            );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $followup = Followup::find($id);
        if(empty($followup))
        {
            return response()->json([]);
        }
        $followup->id_user = $request->id_user;
        $followup->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el Follow.',
            'id' => $followup->id
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $followup = Followup::find($id);
        if(empty($followup))
        {
            return response()->json([]);
        }
        $followup->delete();
        return response()->json([
            'respuesta' => 'Se ha eliminado el Follow.',
            'id' => $followup->id
        ],200);
    }

    public function restore($id)
    {
        $followup = Followup::onlyTrashed()->find($id);
        if (empty($followup)) {
            return response()->json([
                'El follow no ha sido desactivado con anterioridad.'
            ]);
        }
        $followup->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el follow.',
            'id' => $followup->id,
        ], 200);
    }
}
