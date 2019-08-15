<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tarefas</title>
    <link rel="stylesheet" type="text/css" href={{url("/css/app.css")}}>
    <link rel="stylesheet" type="text/css" href={{url("/css/main.css")}}>
    <link rel="stylesheet" href="{{url("https://use.fontawesome.com/releases/v5.7.2/css/all.css")}} integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src={{url("/js/adicionarTarefa.js")}} defer></script>
    <script src={{url("/js/concluirTarefa.js")}} defer></script>
    <script src={{url("/js/main.js")}} defer></script>
    <script src={{url("/js/filtrarTarefas.js")}} defer></script>
  </head>
  <body>

    <div class="container">

      <div id="erro" class="alert alert-danger d-none">
        Preencha a descrição corretamente!
      </div>

      <div id="sucesso" class="alert alert-success d-none">
        Tarefa cadastrada com sucesso!
      </div>

      <h1>To do List</h1>

      <form id="formAdicionarTarefa" action="/incluir-tarefa" method="POST">

        @csrf

        <div class="form-group">
          <label for="description">Digite a Descrição da Tarefa</label>
          <input id="description" class="form-control" name="description" type="text">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i> Incluir Tarefa</button>
        </div>

      </form>

      <hr>

      <h2>Filtrar tarefas</h2>
      <div class="form-group">
        <label for="campoBusca">Digite algo</label>
        <input id="campoBusca" class="form-control" type="text">
      </div>


      <hr>

      <div id="painelTarefasPendentes">
        <h2>Tarefas Pendentes</h2>

        <img src="{{ asset('images/loading.gif') }}" id="loading">

        <ul id="listaTarefas" class="list-group">
        </ul>
      </div>

      <div id="painelTarefasFiltradas" class="d-none">
        <h2>Filtradas:</h2>

        <ul id="listaTarefasFiltradas" class="list-group">
        </ul>
      </div>

    </div>

  </body>
</html>
