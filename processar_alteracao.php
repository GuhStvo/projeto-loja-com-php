<?php
$dados = [];
$arquivo = "banco.json";
if (file_exists($arquivo)) {
    $extrai_dados = file_get_contents($arquivo);
    $dados = json_decode($extrai_dados, true);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dados[$id] = [
        'nome' => $nome,
        'cpf' => $cpf,
        'email' => $email,
        'senha' => $senha
    ];
    if (file_put_contents($arquivo, json_encode($dados))) {
        header('location: listar_usuarios.php');
    }
}