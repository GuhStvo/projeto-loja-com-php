const form_cadastro = document.getElementById("form_cadastro");
const avisos = document.getElementById("avisos");

form_cadastro.addEventListener('submit', (e) => {
    e.preventDefault();

    let dados_form = new FormData(form_cadastro);
    fetch("processar_cadastro.php", {
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

/* ==========MÁSCARAS======== */

document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito
    if (value.length > 9) {
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else if (value.length > 6) {
        value = value.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3');
    } else if (value.length > 3) {
        value = value.replace(/(\d{3})(\d{3})/, '$1.$2');
    } else if (value.length > 0) {
        value = value.replace(/(\d{3})/, '$1');
    }
    e.target.value = value;
});