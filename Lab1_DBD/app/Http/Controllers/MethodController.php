<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $method = Method::all();
        if($method->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran metodos de pago.',
            ]);
        }
        return response($method, 200);

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
                'nombre_titular' => 'required|min:4|max:35',
                'cod_banks' => 'required',
                'cod_tarjeta' => 'required|min:1',
                'fecha_vencimiento' => 'required',
                'CVC' => 'required',
                'num_tarjeta' => 'required|min:16'
            ],
            [
                'nombre_titular.required' => 'Debes ingresar un nombre',
                'nombre_titular.min' => 'El nombre debe ser de largo mínimo :min',
                'nombre_titular.max' => 'El nombre debe ser de largo máximo :max',
                'cod_banks.required'=>'Ingresar el codigo del banco',
                'cod_tarjeta.min' => 'El codigo debe ser de largo mínimo :min',
                'cod_tarjeta.required' => 'Debe ingresar el codigo identificador de la tarjeta',
                'fecha_vencimiento.required' => 'Debe ingresar fecha de vencimiento',
                'CVC.required' => 'Ingresar CVC de la tarjeta',
                'num_tarjeta.required' => 'Ingresar numero de tarjeta',
                'num_tarjeta.min' => 'Largo minimo no alcanzo: min'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $method = new Method;
        $method->nombre_titular = $request->nombre_titular;
        $method->cod_banks = $request->cod_banks;
        $method->CVC = $request->CVC;
        $method->fecha_vencimiento = $request->fecha_vencimiento;
        $method->cod_tarjeta = $request->cod_tarjeta;
        $method->num_tarjeta = $request->num_tarjeta;

        $method->save();
        return response()->json([
            'respuesta' => 'Se ha registrado un nuevo metodo de pago.',
            'id' => $method->id,
            'nombre' => $method->nombre_titular,
            'banco' => $method->cod_banks,
            'codigo tarjeta' => $method->cod_tarjeta,
            'numero tarjeta' => $method->num_tarjeta,
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
        $subject = Method::find($id);
        if (empty($subject)) {
            return response()->json('El metodo buscado no existe.');
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
        $method = Method::find($id);
        if (empty($method)) {
            return response()->json(['Metodo de pago no existe.']);
        }
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_titular' => 'required|min:4|max:35',
                'cod_banks' => 'required',
                'cod_tarjeta' => 'required|min:1',
                'fecha_vencimiento' => 'required',
                'CVC' => 'required',
                'num_tarjeta' => 'required|min:16'
            ],
            [
                'nombre_titular.required' => 'Debes ingresar un nombre',
                'nombre_titular.min' => 'El nombre debe ser de largo mínimo :min',
                'nombre_titular.max' => 'El nombre debe ser de largo máximo :max',
                'cod_banks.required'=>'Ingresar el codigo del banco',
                'cod_tarjeta.min' => 'El codigo debe ser de largo mínimo :min',
                'cod_tarjeta.required' => 'Debe ingresar el codigo identificador de la tarjeta',
                'fecha_vencimiento.required' => 'Debe ingresar fecha de vencimiento',
                'CVC.required' => 'Ingresar CVC de la tarjeta',
                'num_tarjeta.required' => 'Ingresar numero de tarjeta',
                'num_tarjeta.min' => 'Largo minimo no alcanzo: min'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $method->nombre_titular = $request->nombre_titular;
        $method->cod_banks = $request->cod_banks;
        $method->CVC = $request->CVC;
        $method->fecha_vencimiento = $request->fecha_vencimiento;
        $method->cod_tarjeta = $request->cod_tarjeta;
        $method->num_tarjeta = $request->num_tarjeta;

        $method->save();
        return response()->json([
            'respuesta' => 'Se ha actualizado el metodo de pago.',
            'id' => $method->id,
            'nombre' => $method->nombre_titular,
            'banco' => $method->cod_banks,
            'codigo tarjeta' => $method->cod_tarjeta,
            'numero tarjeta' => $method->num_tarjeta,
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
        $subject = Method::find($id);
        if(empty($subject)){
            return response()->json([]);
        }
        $subject->delete();
        return response()->json([
            'respuesta' => 'Se ha eliminado el metodo de pago.',
        ], 200);
    }
}
