<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista;

class ListaController extends Controller
{
    public function getListas($value) {

        if ($value == 'all' ) {
            $listas = Lista::all();
        } else {
            $listas = Lista::where('descricao','like', '%'.$value.'%')->get();
        }

        $response = [
            'listas' => $listas
        ];

        return response() -> json($response, 200);

    }

    public function finalizar(Lista $lista) {
        
    }
}
