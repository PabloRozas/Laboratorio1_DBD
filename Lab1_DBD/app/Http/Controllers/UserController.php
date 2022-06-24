<?php

// Por ejemplo en el caso, Un artista no podria escuchar canciones
// Se podria dejar como supuesto
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran Usuarios registrados.',
            ]);
        }
        return response($users, 200);
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
                'name' => 'required|min:4|max:30|unique:users,name',
                'username' => 'required|min:4|max:100|unique:users,username',
                'email' => 'required|max:30|unique:users,email',
                'fecha_nacimiento' => 'required',
                'id_rol' => 'required'
            ],
            [
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre debe ser de largo mínimo :min',
                'name.max' => 'El nombre debe ser de largo máximo :max',
                'username.unique' => 'El nombre de usuario ya existe',
                'username.min' => 'El nickname debe ser de largo mínimo :min',
                'username.max' => 'El nickname debe ser de largo máximo :max',
                'username.required' => 'Debe ingresar un nickname de usuario',
                'email.required' => 'Debe ingresar un correo electronico',
                'email.unique' => 'El correo electronico ya existe',
                'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
                'id_rol.required' => 'Debes seleccionar un rol'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = new User;
        $user->name = $request->name;               //Se pide un usuario que no exista
        $user->username = $request->username;       //Username que no exista
        $user->email = $request->email;             //email con formato email
        $user->fecha_nacimiento = $request->fecha_nacimiento;   //Fecha de nacimiento con formato AAAA/MM/DD
        $user->suscripcion = false;                 //Se inicia con la creacion en falso para suscripcion
        $user->num_tarjeta = null;                  //Al no tener suscripcion no se crea realcion con tabla de pago
        $user->id_rol = $request->id_rol;           //Se le da un rol al usuario dependiendo de sus permisos
        $user->fecha_creacion = now();
        $edad = date_diff(date_create($user->fecha_nacimiento), date_create($user->fecha_creacion));
        $user->edad = $edad->format('%y');
        $user->save();
        return response()->json([
            'respuesta' => 'Se ha registrado un nuevo usuario.',
            'id' => $user->id,
            'nombre' => $user->name,
            'correo' => $user->email,
            'rol' => $user->id_rol,
            'suscripcion' => $user->suscripcion
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
        $subject = User::find($id);
        if (empty($subject)) {
            return response()->json('El Usuario ingresado no existe.');
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
            $request->all(),
            [
                'name'=>'required|max:30',
                'username' => 'required|min:4|max:100|unique:users,username',
                'email'=>'required|max:30|unique:users,email',
                'fecha_nacimiento'=>'required',
                'id_rol' => 'required',
                'password' => 'required',
                'suscripcion' => 'required'
            ],
            [
                'name.required'=>'Debes ingresar un nombre',
                'username.unique' => 'El nombre de usuario ya existe',
                'username.min' => 'El nickname debe ser de largo mínimo :min',
                'username.max' => 'El nickname debe ser de largo máximo :max',
                'username.required' => 'Debe ingresar un nickname de usuario',
                'email.required'=>'Debe ingresar un correo electronico',
                'email.unique'=>'El correo electronico ya existe',
                'fecha_nacimiento.required'=>'Debe ingresar una fecha de nacimiento',
                'id_rol.required' => 'Debes seleccionar un rol',
                'suscripcion' => 'Ingresa una suscripcion',
                'password' => 'Porfavor ingrese la contraseña'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['User no válido.']);
        }
        //$subject->name = $request->name;
        $user->username = $request->username;
        $user->email =$request->email;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->password = $request->password;
        $user->id_rol = $request->id_rol;
        $user->suscripcion = $request->suscripcion;

        $user->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el Usuario.',
            'id' => $user->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    //Funciona correctamente
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json([]);
        }
        $user->delete();
        return response()->json([
            'respuesta' => 'Se ha desactivado el usuario.',
            'id' => $user->id,
            'username' => $user->username,
            'suscrito' => $user->suscripcion,
        ], 200);
    }

    public function restore($id)    //Funciona Correctamente
    {
        $user = User::onlyTrashed()->find($id);
        if (empty($user)) {
            return response()->json(['El usuario no ha sido desactivado con anterioridad.']);
        }
        $user->restore();
        return response()->json([
            'respuesta' => 'Se ha activado el usuario.',
            'id' => $user->id,
            'username' => $user->username,
            'suscrito' => $user->suscripcion,
        ], 200);
    }
}
