function adicionaEventoConcluir () {
    var botoesConcluir = document.querySelectorAll('.btnConcluir')

    botoesConcluir.forEach(function(botao){
        botao.onclick = function (event) {
            event.preventDefault()
            
            var querConcluir = confirm('Deseja realmente concluir?')
            var id = botao.dataset.id
            
            if (!querConcluir) { return }
            
            loading.classList.remove('d-none')

            fetch('http://localhost:8000/api/concluir-tarefa', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id
                })
            }).then(function(response) {
                response.json().then(function(data){
                    loading.classList.add('d-none')
                    if (data.salvou === true) {
                        botao.parentNode.classList.add('d-none')
                    }
                })
            })
        }
    })
}

