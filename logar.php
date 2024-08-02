<?php
$nome_admin = "Admin";
$login_admin = "admin@email.com";
$senha_admin = "123";
$nome_user = "Usuário";
$login_user = "user@email.com";
$senha_user = "321";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $status = $_POST['status'];

    if ($status > 0) {
        if ($email == $login_admin) {
            if ($senha == $senha_admin) {
                // Verifica se existe uma sessão, se não existir ele inicia uma sessão
                session_start();
                // Global SESSION grava dados da pessoa logada
                $_SESSION['email'] = $login_admin;
                $_SESSION['nome'] = $nome_admin;
                $_SESSION['status'] = 1;
                // Redireciona a página para o local indicado, no caso (raiz) index.php
                header('location: ./');
            } else {
                header('location: ./?erro=erro');
            } //Caso a senha esteja errada
        } else {
            header('location: ./?erro=erro');
        } // Caso o osuário esteja correto
    } else {
        // Verificação de USUÁRIO ----------------------------------
        if ($email == $login_user) {
            if ($senha == $senha_user) {
                // Verifica se existe uma sessão, se não existir ele inicia uma sessão
                session_start();
                // Global SESSION grava dados da pessoa logada
                $_SESSION['email'] = $login_user;
                $_SESSION['nome'] = $nome_user;
                $_SESSION['status'] = 0;
                // Redireciona a página para o local indicado, no caso (raiz) index.php
                header('location: ./');
            } else {
                header('location: ./?erro=erro');
            } //Caso a senha esteja errada
        } else {
            header('location: ./?erro=erro');
        } // Caso o osuário esteja correto
    }
}
