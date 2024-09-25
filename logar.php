<?php

/* $nome_admin = "Admin";
$login_admin = "admin@email.com";
$senha_admin = "123";
$nome_user = "Usuário";
$login_user = "user@email.com";
$senha_user = "321"; */

include_once './admin/conexao.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senhaLogin = $_POST['senhaLogin'];

    $selectEmail = $conexao->prepare("SELECT * FROM usuario WHERE email, senha = :email, :senhaBD");
    $selectEmail->bindParam('email', $email);
    $selectEmail->execute();
    while ($array = $selectEmail->fetch(PDO::FETCH_ASSOC)) {
        $id_usuario = $array['id_usuario'];
        $senha_banco = $array['senhaLogin'];
        $email_banco = $array['email'];
    }



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

/* Fatal error: Uncaught PDOException: SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens in C:\xampp\htdocs\front\logar.php:21 Stack trace: #0 C:\xampp\htdocs\front\logar.php(21): PDOStatement->execute() #1 {main} thrown in C:\xampp\htdocs\front\logar.php on line 21 */