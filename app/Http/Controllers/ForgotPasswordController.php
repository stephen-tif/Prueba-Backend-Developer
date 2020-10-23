<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;

class ForgotPasswordController extends Controller
{
    public function forgot(ForgotRequest $request) {

        $email = $request->input('email');

        if(User::where('email', $email)->doesntExist()) {
            return response()->json([
                'Error'=>'El usuario no existe!'
            ], 400);
        }
        $token = Str::random(10);

        try{
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::send('Mails.forgot',['token' => $token],function(Message $message) use ($email)
            {
                $message->to($email);
                $message->subject('Restablecer tu password');
            });

            return response()->json(['Mensaje'=>'Revisa tu email!'], 400);

        } catch(Exception $e){
            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }

    public function reset(ResetRequest $request) {
        try{
            $token = $request->input('token');

            if (!$passwordResets = DB::table('password_resets')->where('token', $token)->first()) {
                return response()->json(['Error'=>'Token invalido!'],400);
            }

            if(!$user = User::where('email', $passwordResets->email)->first()) {
                return response()->json(['Error'=>'Usuario invalido!'],400);
            }
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return response()->json(['Mensaje'=>'password restablecida con exito!']);

        } catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

}
