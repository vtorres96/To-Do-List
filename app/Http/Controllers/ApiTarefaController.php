<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class ApiTarefaController extends Controller
{
    public function incluirTarefa(Request $request) {
      if (!$request->has('description')) {
        return response()->json('A descrição da tarefa é obrigatória', 400);
      }

      $tarefa = new Tarefa;
      $tarefa->description = $request->input('description');
      $tarefa->done = false;
      $tarefa->save();

      return response()->json($tarefa, 200);
    }

    public function concluirTarefa(Request $request) {
      $id = $request->input('id');
      $tarefa = Tarefa::find($id);
      $tarefa->done = true;
      $salvou = $tarefa->save();

      $mensagem = [
        "salvou" => $salvou,
      ];

      return response()->json($mensagem, 200);
    }

    public function tarefasPendentes() {
      $tarefas = Tarefa::where('done', '<>', true)->get();

      return response()->json($tarefas, 200);
    }

    public function filtrarTarefas($palavra){
      $tarefas = Tarefa::
        where('description', 'like', '%'.$palavra.'%')
        ->where('done', '=', 0)
        ->get();

      return response()->json($tarefas, 200);
    }
}
