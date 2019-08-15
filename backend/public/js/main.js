function adicionarTarefasIniciais (tarefa) {
    var htmlTarefa = `
        <li class="list-group-item">
            ${tarefa.description}
            <a href="#" data-id="${tarefa.id}" class="btn btn-success float-right btnConcluir">
                <i class="fa fa-check"></i> 
                Concluir
            </a>
        </li>
   `
    return htmlTarefa
}

fetch('http://localhost:8000/api/tarefas-pendentes', {
    method: 'GET',
    headers: {
        'Accept':'application/json',
        'Content-Type':'application/json'
    }
}).then(function(response){
    response.json().then(function(tarefas) {
        loading.classList.add('d-none')
        
        var htmlTarefas = tarefas.map(adicionarTarefasIniciais).join('')
        listaTarefas.innerHTML = htmlTarefas

        adicionaEventoConcluir()
    })
})