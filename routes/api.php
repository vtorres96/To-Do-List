<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/adicionar-tarefa', 'ApiTarefaController@incluirTarefa');
Route::post('/concluir-tarefa', 'ApiTarefaController@concluirTarefa');
Route::get('/tarefas-pendentes', 'ApiTarefaController@tarefasPendentes');
Route::get('/filtrar-tarefas/{palavra}', 'ApiTarefaController@filtrarTarefas');