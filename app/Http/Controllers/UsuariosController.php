<?php

namespace App\Http\Controllers;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
{
    public function postUsuarios(Request $request)
    {
     $usuarios = new Usuarios();
     $usuarios->nome = $request->input('nome');
     $usuarios->email = $request->input('email');
     $usuarios->password = \Hash::make($request->input('password'));
     $usuarios->nascimento = $request->input('nascimento');
     $usuarios->boleto = $request->input('boleto');
     $usuarios->ccredito = $request->input('ccredito');
     $usuarios->cdebito = $request->input('cdebito');
     $usuarios->save();
     return response()->json(['usuarios' => $usuarios], 201);    
    }


    public function getUsuarios()
    {
        $usuarios = Usuarios::all();
        $response = [
            'usuarios' => $usuarios
        ];
        return response() -> json($response, 200);
    }

    public function postAuthUser(Request $request)
    {
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($login)) {
            $user = Auth::user();
            return response($user, 201);
        }else{
            return response ('Usuario e password não combinam',403);
        }
    }
}
