<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\PutUser;
use App\Http\Requests\User\PostUser;

class UserController extends Controller
{
    public function log(Request $request)
    {
        $user = User::where('email', $request['email'])->where('password', $request['password'])->get();
        if ($user->count() > 0) {
            $response['logeado'] = true;
            $response['user'] = $user;
            return response()->json($response);
        } else {
            $response['logeado'] = false;
            $response['user'] = $user;
            return response()->json($response);
        }
    }

    public function register(PostUser $request)
    {
        $user = User::create([
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'password' => $request['password'],
            'tipo_usuario' => $request['tipo_usuario']
        ]);
        return response()->json($user);
    }

    public function update(PutUser $request, $id)
    {
        $user = User::find($id);
        if ($request['password']) {
            $user->update([
                'nombre' => $request['nombre'],
                'email' => $request['email'],
                'password' => $request['password']
            ]);
        } else {
            $user->update([
                'nombre' => $request['nombre'],
                'email' => $request['email'],
            ]);
        }

        return response()->json($user);
    }

    public function RestorePassword(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user) {

            $user->update($request->all());
           
            $response['message'] = 'Cambio exitoso' ;

            return response()->json($response);
        } else {
            $response['message'] = 'Hubo un error'; 
            $response['errors'] = 'No se encontro usuario'; 
            return response()->json($response);
        }
    }

    public function getUsuarios()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
       
        $user->update([
            'email' => $user['email']."_ELIMINADO".$id,
        ]);
        $user->delete();
        return response()->json($user);
    }
}
