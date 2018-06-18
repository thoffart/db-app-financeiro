<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receita;

class ReceitaController extends Controller
{
    public function postReceita(Request $request ){
        $receita = new Receita();
        $receita->email = $request->input('email');
        $receita->descricao = $request->input('descricao');
        $receita->valor = $request->input('valor');
        $receita->save();
        return response()->json(['receita' => $receita], 201); 
    }
}
