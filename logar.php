<?php
$nome_admin = "Admin";
$senha_admin = "123";
$login_admin = "admin@email.com";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($email == $login_admin) {
        if($senha == $senha_admin) {
            // Verifica se existe uma sessão, se não existir ele inicia uma sessão
            session_start();
            // Global SESSION grava dados da pessoa logada
            $_SESSION['email'] = $login_admin;
            $_SESSION['nome'] = $nome_admin;
            // Redireciona a página para o local indicado, no caso (raiz) index.php
            header('location: ./');
        } else {
            header('location: ./?erro=erro');
        } //Caso a senha esteja errada
    } else {
        header('location: ./?erro=erro');
    } // Caso o osuário esteja correto
}