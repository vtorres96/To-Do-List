function exibirErro (exibir) {
    if (exibir) {
        // adiciona borda vermelha
        description.classList.add('erro') 
        // exibe mensagem de erro
        erro.classList.remove('d-none') 
    } else {
        // remove borda vermelha
        description.classList.remove('erro') 
        // remove a caixa com mensagem de erro
        erro.classList.add('d-none') 
    }
}

function descricaoEstaIncorreta () {
    return description.value === '' || description.value.length < 5
}
 
function aoEnviarOFormulario (event) {
    event.preventDefault()

    if (descricaoEstaIncorreta()) {
        exibirErro(true)
        return
    }

    loading.classList.remove('d-none')

    fetch('http://localhost:8000/api/adicionar-tarefa', {
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            description: description.value
        })
    }).then(function(response){
        response.json().then(function(data){
            loading.classList.add('d-none')
            inserirTarefaNoHTML(data)
        })
    })
}
 
function inserirTarefaNoHTML (tarefa) {
   var htmlTarefa = `
        <li class="efeito-piscar list-group-item">
            ${tarefa.description}
            <a href="#" data-id="${tarefa.id}" class="btn btn-success float-right btnConcluir">
                <i class="fa fa-check"></i> 
                Concluir
            </a>
        </li>
   `
   var conteudoAntigo = listaTarefas.innerHTML

   listaTarefas.innerHTML = htmlTarefa + conteudoAntigo

    //remove a classe efeito-piscar
   var liEfeitoPiscar = document.querySelector('.efeito-piscar')

   setTimeout(function(){
       liEfeitoPiscar.classList.remove('efeito-piscar')
   }, 3000)

   adicionaEventoConcluir()

   // limpa o input descrição da tarefa
   description.value = ''

    //exibe sucesso
   sucesso.classList.remove('d-none')

   setTimeout(function() {
    sucesso.classList.add('d-none')
   }, 3500)

}

function aoDigitarNaDescricao () {
    exibirErro(false)
}

// Eventos
formAdicionarTarefa.onsubmit = aoEnviarOFormulario
description.onkeypress = aoDigitarNaDescricao


