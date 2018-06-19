<?php

namespace App\Http\Controllers;
use App\Gasto;
use Illuminate\Http\Request;

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

    public function updateGasto(Request $request){
        $id = $request->input('id');
        $gasto = Gasto::where('id', $id)->update([
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'pagamento' => $request->input('pagamento')
        ]);
        return response()->json(200); 
    }
}
