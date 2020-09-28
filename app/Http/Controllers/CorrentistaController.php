<?php

namespace App\Http\Controllers;

use App\Correntista;
use Illuminate\Http\Request;

class CorrentistaController extends Controller
{
    public function index()
    {
        $correntistas = Correntista::all();
        return response()->json($correntistas);

    }

    public function store(Request $request){

        $correntista = new Correntista([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'genero' => $request->genero,
            'nascimento' => $request->nascimento,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'status' => '1',
        ]);

        $correntista->save();

        return response()->json('Novo correntista criado com sucesso.');
    }

    public function show($id){
            $correntista = Correntista::find($id);
            return response()->json($correntista);

    }



    public function update(Request $request, $id){
        $correntista = Correntista::find($id);
        $correntista->updated($request->all);

        return response()->json('Dados alterados com sucesso.');

    }

    public function destroy($id){
        $correntista = Correntista::find($id);
        $correntista->status = 0;
        $correntista->save();

        return response()->json('O correntista informado foi desativado.');
    }

}
