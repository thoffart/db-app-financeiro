<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;

class GastoController extends Controller
{
    public function getGastos($email)
    {
        $gastos = Gasto::where('email', $email)->orderBy('created_at','desc')->get();
        foreach($gastos as $gasto){
            $gasto->categoria->nome;
        }
        $response = [
            'gastos' => $gastos
        ];
        return response() -> json($response, 200);
    }

    public function deleteGasto($id){
        Gasto::find($id)->delete();
        return 204;
    }
}
