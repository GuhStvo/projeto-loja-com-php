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

        if ($email == $login_admin) {
            if ($senha == $senha_admin) {
                // Verifica se existe uma sessão, se não existir ele inicia uma sessão
                session_start();
                // Global SESSION grava dados da pessoa logada
                $_SESSION['email'] = $login_admin;
                $_SESSION['nome'] = $nome_admin;
                $_SESSION['status'] = 1;
                // Redireciona a página para o local indicado, no caso (raiz) index.php
                // header('location: ./');
                echo "Ok você está autenticado.";
            } else {
                // header('location: ./?erro=erro');
                echo "Login ou senha inválidos.";
            } //Caso a senha esteja errada
        } else {
            // header('location: ./?erro=erro');
            echo "Login ou senha inválidos.";
        } // Caso o osuário esteja correto
}
