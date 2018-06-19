<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receita;

class ReceitaController extends Controller
{

    public function getReceitas($email)
    {
        $receita = Receita::where('email', $email)->orderBy('created_at','desc')->get();
        $response = [
            'receitas' => $receita
        ];
        return response() -> json($response, 200);
    }

    public function deleteReceita($id){
        Receita::find($id)->delete();
        return 204;
    }
  
    public function postReceita(Request $request ){
        $receita = new Receita();
        $receita->email = $request->input('email');
        $receita->descricao = $request->input('descricao');
        $receita->valor = $request->input('valor');
        $receita->save();
        return response()->json(['receita' => $receita], 201); 

    }

    public function updateReceita(Request $request){
        $id = $request->input('id');
        $receita = Receita::where('id', $id)->update([
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor')
        ]);
        return response()->json(200); 
    }
  
    public function getReceitaFilter($email, $filter)
    {
        if($filter == "data"){
            $receitas = Receita::where('email', $email)->orderBy('created_at','desc')->get();
        } elseif ($filter == "valor"){
            $receitas = Receita::where('email', $email)->orderBy('valor','desc')->get();
        }
        $response = [
            'receitas' => $receitas
        ];
        return response() -> json($response, 200);
    }

    public function deletarReceitas($id){
        Receita::find($id)->delete();
        return 204;
    }
}
