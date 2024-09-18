/* Pegando a tabela no html */
const form_cadastro_produto = document.getElementById("form_cadastro_produto");
/* Pegando dialog no html */
const avisos = document.getElementById("avisos");

/* Criando um evento para quando ocorrar um envio no formulário" */
form_cadastro_produto.addEventListener('submit', (e) => {
    /* Parametro na função para não recarregar a página */
    e.preventDefault();

    /* Pegando dados do formulário */
    let dados_form = new FormData(form_cadastro_produto);
    fetch("processar_produto.php", {
        body: dados_form,
        method: "POST",
    })
    .then((resposta) => {
        if (resposta.ok) {
            return resposta.text();
        }
    })
    .then((mensagem) => {
        avisos.innerHTML = mensagem;
        avisos.open = true;
        setTimeout(() => {
            avisos.open = false;
        }, 5000);
    })
})