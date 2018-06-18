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

    public function postListas(Request $request) {
        if ($request->input('id')) {
            $lista = Lista::find($request->input('id'));
        } else {
            $lista = new Lista;
        }
        $lista->descricao = $request->input('descricao');
        $lista->email = $request->input('email');
        $lista->save();

        return response()->json(['listas' => $lista], 201);    
    }

    public function deleteListas($id) {
        $lista = Lista::find($id);
        $lista->delete();

        return response()->json(['listas' => $lista], 200);
    }

}
