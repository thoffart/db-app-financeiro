<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;


class CategoriaController extends Controller
{
    
    public function getCategorias($cat)
    {
        if($cat == "-987"){
            $categorias = Categoria::all();
        }else{
            $categorias = Categoria::where('nome','ilike', '%'.$cat.'%')->get();
        }
        $response = [
            'categorias' => $categorias
        ];
        return response() -> json($response, 200);
    }

    
    public function getCategoriasLista() {
        $categorias = Categoria::all();
        $response = [
            'categorias' => $categorias
        ];
        return response() -> json($response, 200);    }
}
