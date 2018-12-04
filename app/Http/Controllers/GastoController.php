<?php

namespace App\Http\Controllers;
use App\Gasto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GastoController extends Controller
{

    public function getGastos($email)
    {
        $gastos = DB::SELECT(DB::raw("SELECT usuarios.gastos FROM usuarios WHERE usuarios.email = '{$email}'"));
        Log::debug($gastos);
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

    public function getGastosFilter($email, $filter)
    {   
        if($filter == "data"){
            $gastos = Gasto::where('email', $email)->orderBy('created_at','desc')->get();
        } elseif($filter == "valor") {
            $gastos = Gasto::where('email', $email)->orderBy('valor','desc')->get();
        } elseif($filter == "categoria"){
            $gastos = Gasto::where('email', $email)->orderBy('catid','asc')->get();
        } elseif($filter == "pagamento"){
            $gastos = Gasto::where('email', $email)->orderBy('pagamento','asc')->get();
        }
        foreach($gastos as $gasto){
            $gasto->categoria->nome;
        }
        $response = [
            'gastos' => $gastos
        ];
        return response() -> json($response, 200);
    }
}
