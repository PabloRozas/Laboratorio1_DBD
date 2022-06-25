<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        if ($banks->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran bancos',
            ]);
        }
        return response($banks,200);
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
                'nombre' => 'required|min:2|max:30'
            ],
            [
                'nombre.required' => 'Debes ingresar un nombre',
                'nombre.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $newBank = new Bank();
        $newBank->nombre= $request->nombre;
        $newBank->save();
        return response()->json([
            'respuesta' => 'Se ha creado un nuevo banco',
            'id' => $newBank->id
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);
        if(empty($bank)){
            return response()->json([]);

        }
        return response($bank);
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
            $request->all(),[
                'nombre' => 'required|min:2|max:30'
            ],
            [
                'nombre.required' => 'Debes ingresar un nombre',
                'nombre.min' => 'El nombre debe tener un largo min de 2 caracteres',
                'nombre.max' => 'El nombre excede el máximo de caracteres',
            ]
            );
        if ($validator->fails()){
            return response($validator->errors());
        }
        $bank = Bank::find($id);
        if(empty($bank))
        {
            return response()->json([]);
        }
        $bank->nombre = $request->nombre;
        $bank->save();
        return response()->json([
            'respuesta' => 'Se ha modificado un nuevo banco',
            'id' => $bank->id
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
        //
        $bank = Bank::find($id);
        if(empty($bank))
        {
            return response()->json([]);
        }

        $bank->delete();

        return response()->json([
            'respuesta' => 'Se ha borrado un nuevo banco',
            'id' => $bank->id
        ],200);
    }

    public function restore($id)
    {
        //
        $bank = Bank::onlyTrashed()->find($id);
        if(empty($bank))
        {
            return response()->json([]);
        }
        $bank->restore();
        return response()->json([
            'respuesta' => 'Se ha restaurado un nuevo banco',
            'id' => $bank->id
        ],200);
    }
}
