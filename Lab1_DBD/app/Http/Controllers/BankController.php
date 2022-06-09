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
                'respuesta' => 'No se encuentran subjects',
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
        $newBank = new Bank();
        $newBank->nombre= $request->name;
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
