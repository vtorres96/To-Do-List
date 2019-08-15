campoBusca.onkeyup = function (e) {
    var valorDigitado = this.value

    if (!valorDigitado) {
        painelTarefasPendentes.classList.remove('d-none')
        painelTarefasFiltradas.classList.add('d-none')  
        return
    }

    if (e.key === 'Backspace') {
        return
    }

    window.clearInterval(window.espera)

    window.espera = setTimeout(function() {
        
        fetch('http://localhost:8000/api/filtrar-tarefas/' + valorDigitado)
            .then(response => {
                response.json().then(tarefas => {
                    painelTarefasPendentes.classList.add('d-none')
                    painelTarefasFiltradas.classList.remove('d-none')

                    var htmlTarefas = tarefas.map(adicionarTarefasIniciais).join('')

                    listaTarefasFiltradas.innerHTML = htmlTarefas

                    adicionaEventoConcluir()
                })
            })

    }, 500)
}