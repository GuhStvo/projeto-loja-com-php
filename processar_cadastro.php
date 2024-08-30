<?php 

include "./admin/conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Pegou os dados do formulário */
    $nome = $_POST['nome'];
    $CPF = $_POST['CPF'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    /* Crio o array com os dados */
    $novo = [
        'nome' => $nome,
        'email' => $email,
        'cpf' => $cpf,
        'senha' => $senha
    ];

    $inserindo = $conexao->prepare("INSERT INTO usuario (nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)");
}