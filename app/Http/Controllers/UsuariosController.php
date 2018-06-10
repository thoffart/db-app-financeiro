<?php

namespace App\Http\Controllers;
use App\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    public function postUsuarios(Request $request)
    {
     $usuarios = new Usuarios();
     $usuarios->nome = $request->input('nome');
     $usuarios->email = $request->input('email');
     $usuarios->password = $request->input('password');
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
}
