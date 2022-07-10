<?php

// Por ejemplo en el caso, Un artista no podria escuchar canciones
// Se podria dejar como supuesto
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

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
        return view('admin.usuarios', compact('users'));
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
                'password' => 'required|min:4|max:30',
                'fecha_nacimiento' => 'required',
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
            ]
        );
        if ($validator->fails()) {
            return view('admin.validacion', compact('validator'));
        }
        
        $user = new User;
        $user->name = $request->name;               //Se pide un usuario que no exista
        $user->username = $request->username;       //Username que no exista
        $user->email = $request->email;
        $user->password = $request->password;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->suscripcion = false;
        $user->num_tarjeta = null;          //Se le da un rol al usuario dependiendo de sus permisos
        $user->fecha_creacion = now();
        $user->assignRole('user');
        $user->save();
        return redirect('users')->with('mensaje','Nuevo usuario agregado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json('El Usuario ingresado no existe.');
        }
        return view('admin.veruser', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  app\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.editar_usuario', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        /**
        *$validator = Validator::make(
        *    $request->all(),
        *    [
        *        'name' => 'required|min:4|max:30|unique:users,name',
        *        'username' => 'required|min:4|max:100|unique:users,username',
        *        'email' => 'required|max:30|unique:users,email',
        *        'password' => 'required|min:4|max:30',
        *        'fecha_nacimiento' => 'required',
        *    ],
        *    [
        *        'name.required' => 'Debes ingresar un nombre',
        *        'name.min' => 'El nombre debe ser de largo mínimo :min',
        *        'name.max' => 'El nombre debe ser de largo máximo :max',
        *        'username.unique' => 'El nombre de usuario ya existe',
        *        'username.min' => 'El nickname debe ser de largo mínimo :min',
        *        'username.max' => 'El nickname debe ser de largo máximo :max',
        *        'username.required' => 'Debe ingresar un nickname de usuario',
        *        'email.required' => 'Debe ingresar un correo electronico',
        *        'email.unique' => 'El correo electronico ya existe',
        *        'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
        *    ]
        *);
        */
        
        $user->update($request->all());

        
        
        return redirect()->route('users.index')->with('mensaje','Usuario actualizado.');
    }

    /*
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30',
                'username' => 'required|min:4|max:100|unique:users,username',
                'email' => 'required|max:30|unique:users,email',
                'fecha_nacimiento' => 'required',
                'password' => 'required',
                'suscripcion' => 'required'
            ],
            [
                'name.required' => 'Debes ingresar un nombre',
                'username.unique' => 'El nombre de usuario ya existe',
                'username.min' => 'El nickname debe ser de largo mínimo :min',
                'username.max' => 'El nickname debe ser de largo máximo :max',
                'username.required' => 'Debe ingresar un nickname de usuario',
                'email.required' => 'Debe ingresar un correo electronico',
                'email.unique' => 'El correo electronico ya existe',
                'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
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
        $user->email = $request->email;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->password = $request->password;
        $user->id_rol = $request->id_rol;
        $user->suscripcion = $request->suscripcion;
        $user->fecha_creacion = now();

        $user->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el Usuario.',
            'id' => $user->id
        ], 200);
    }
*/
    //Metodo para actualizar el rol de un usuario
    public function updateRol(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [   
                //Se valida que el rol se admin, user o artist
                'id_rol' => 'required|in:1,2,3'
                
            ],
            [
                'rol.required' => 'Debes ingresar un rol'
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = User::find($id);
        if (empty($user)) {
            return response()->json(['User no válido.']);
        }
        //Se remueve el rol anterior del usuario
        if(empty($user->roles->first()->name)){
            if($request->id_rol == 1){
                $user->assignRole('admin');
            }else if($request->id_rol == 2){
                $user->assignRole('user');
            }else if($request->id_rol == 3){
                $user->assignRole('artist');
            }
        }else{
            $user->removeRole($user->roles->first()->name);
            if($request->id_rol == 1){
                $user->assignRole('admin');
            }else if($request->id_rol == 2){
                $user->assignRole('user');
            }else if($request->id_rol == 3){
                $user->assignRole('artist');
            }
        }
        $users = User::all();
        if ($users->isEmpty()) {
            return response()->json([
                'respuesta' => 'No se encuentran Usuarios registrados.',
            ]);
        }
        
        
       
        
        return view('/admin/index', compact('users'));
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
