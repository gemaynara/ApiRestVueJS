<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Correntista;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $contas = Conta::all();
        return response()->json($contas);

    }

    public function store(Request $request)
    {
        $conta = new Conta();
        $conta->correntista_id = $request->correntista_id;
        $conta->agencia = $request->agencia;
        $conta->numero_conta = $request->numero_conta;
        $conta->tipo_conta = $request->tipo_conta;
        $conta->saldo = $request->saldo;
        $conta->status = '1';

        $conta->save();
        return response()->json('Conta criada com sucesso.');
    }


    public function show($id){
        $conta = Conta::find($id);
        return response()->json($conta);
    }

    public function update(Request $request, $id)
    {
        $conta = Conta::find($id);
        $conta->updated($request->all);

        return response()->json('Dados alterados com sucesso.');
    }

    public function destroy($id)
    {

        $conta = Conta::find($id);
        $conta->status = 0;
        $conta->save();

        return response()->json('A conta informada foi desativada.');
    }

    public function buscarCorrentista(Request $request){
        $correntista = Correntista::join('conta', 'conta.correntista_id', 'correntista.id')
            ->select('conta.id as idconta','agencia', 'numero_conta', 'tipo_conta', 'nome', 'cpf', 'saldo')
            ->where('agencia', $request->agencia)
            ->where('numero_conta', $request->conta)
            ->take(1)
            ->get();

        return ['correntista' => $correntista];

    }


}
