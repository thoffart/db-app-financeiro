<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receita;

class ReceitaController extends Controller
{
    public function getReceitas($email)
    {
        $receita = Receita::select('valor')->where('email', $email)->get();
        $response = [
            'receitas' => $receita
        ];
        return response() -> json($response, 200);
    }
}
