<?php

namespace App\Http\Controllers;
use App\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function postGasto(Request $request ){
        $gasto = new Gasto();
        $gasto->email = $request->input('email');
        $gasto->descricao = $request->input('descricao');
        $gasto->valor = $request->input('valor');
        $gasto->catid = $request->input('catid');
        $gasto->pagamento = $request->input('pagamento');
        $gasto->save();
        return response()->json(['gasto' => $gasto], 201); 
    }
}
