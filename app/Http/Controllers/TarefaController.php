<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefaController extends Controller
{
    public function inicio() {
      $tarefasPendentes = Tarefa::where('done', '<>', true)->get();

      return view('inicio')->with('tarefasPendentes', $tarefasPendentes);
    }

    public function incluirTarefa(Request $request) {
      $request->validate([
        'description' => 'required'
      ]);

      $tarefa = new Tarefa;
      $tarefa->description = $request->input('description');
      $tarefa->done = false;
      $tarefa->save();

      return redirect('/');
    }

    public function concluirTarefa($id) {
      $tarefa = Tarefa::find($id);
      $tarefa->done = true;
      $tarefa->save();

      return redirect('/');
    }
}
