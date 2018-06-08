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
