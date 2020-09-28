<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::apiResource('correntistas','CorrentistaController');
Route::get('buscarCorrentista','ContaController@buscarCorrentista');

Route::apiResource('contas','ContaController');

Route::post('depositoConta','MovimentacaoContaController@deposito');
Route::post('saqueConta','MovimentacaoContaController@saque');
Route::get('extratoConta','MovimentacaoContaController@extrato');
