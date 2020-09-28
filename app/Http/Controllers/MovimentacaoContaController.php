<?php

namespace App\Http\Controllers;

use App\Conta;
use App\MovimentacaoConta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentacaoContaController extends Controller
{
    public function deposito(Request $request)
    {
        try {

            DB::beginTransaction();
            $conta = Conta::query()->where('id', $request->idconta)
                ->increment('saldo', $request->valor);

            $movimento = new MovimentacaoConta();
            $movimento->conta_id = $request->idconta;
            $movimento->tipo = 'D';
            $movimento->valor = $request->valor;
            $movimento->data = Carbon::now()->toDateString();
            $movimento->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function saque(Request $request)
    {
        try {

            DB::beginTransaction();
            $conta = Conta::query()->where('id', $request->idconta)
                ->decrement('saldo', $request->valor);

            $movimento = new MovimentacaoConta();
            $movimento->conta_id = $request->idconta;
            $movimento->tipo = "S";
            $movimento->valor = $request->valor;
            $movimento->data = Carbon::now()->toDateString();
            $movimento->save();


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function extrato(Request $request)
    {
        $extrato = MovimentacaoConta::join('conta', 'conta.id', 'movimentacao_conta.conta_id')
            ->select('tipo', 'valor', 'data')
            ->where('agencia', $request->agencia)
            ->where('numero_conta', $request->conta)
            ->orderBy('data', 'asc')
            ->get();

        return ['extrato' => $extrato];
    }
}
