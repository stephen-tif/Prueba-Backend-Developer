<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Agregar nuevo usuario
    public function store(Request $request)
    {
        try{
            $rules = [
                'nombre' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'username' => 'required|unique:users',
                'telefono' => 'numeric',
            ];
            $validate = validator::make($request->all(), $rules);

            if($validate->fails()) {
                return response()->json($validate->errors(), 400);
            }

            $user = User::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'username' => $request->username,
                'f_nacimiento' => $request->f_nacimiento,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return response()->json($user);

        } catch(Exception $e){
            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Mostrar los usuarios
    public function show()
    {
        try{
            $result = User::paginate(15);
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Mostrar usuario por id
    public function get($id)
    {
        try{
            $result = User::find($id);
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Modificar un usuario
    public function update($id, Request $request)
    {
        try{
            $result = User::find($id);
            $data = $request->all();
            if(isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $result->fill($data)->save();

            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Eliminar un usuario
    public function destroy($id)
    {
        try{
            $result = User::find($id);
            $result->delete();

            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }

}
