<?php 
include "./admin/conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Pegou os dados do formulário */
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $erro = "";

    /* Verificação do nome */
    if (empty($nome)) {
        $erro .= "Preencha o campo nome.<br>";
    } else if(strlen($nome) < 3) {
        $erro .= "O nome necessita de no mínimo 3 caracteres.<br>";
    }

    /* Verificaçã de CPF */
    if(empty($cpf)) {
        $erro .= "Preencha o campo CPF.<br>";
    } else {
        $selectCPF = $conexao->prepare('SELECT cpf FROM usuario WHERE cpf = :cpf');
        $selectCPF->bindParam('cpf', $cpf);
        $selectCPF->execute();

        if($selectCPF->rowCount()) {
            $erro = "CPF já registrado. <br>";
        }
    }

    /* Verificação E-mail */
    if(empty($email)) {
        $erro .= "Preencha o campo e-mail <br>";
    } else {
        $selectEmail = $conexao->prepare("SELECT email FROM usuario WHERE email = :email");
        $selectEmail->bindParam('email', $email);
        $selectEmail->execute();

        if($selectEmail->rowCount()) {
            $erro .= "E-mail já cadastrado.<br>";
        }
    }

    /* Verificação Senha */
    if (empty($senha)) {
        $erro .= "Preencha o campo senha.<br>";
    } else if(strlen($senha) < 8) {
        $erro .= "A senha deve ter no mínimo 8 caracteres.<br>";
    } else {
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    }

    echo $erro;
    if($erro == "") {
            /* Crio o array com os dados */
    $dadosPDO = [
        'nome' => $nome,
        'cpf' => $cpf,
        'email' => $email,
        'senha' => $senhaCripto
    ];

    $inserindo = $conexao->prepare("INSERT INTO usuario (nome, cpf, email, senha) VALUES (:nome, :cpf, :email, :senha)");
    $inserindo->bindParam(':nome', $nome);
    $inserindo->bindParam(':cpf', $cpf);
    $inserindo->bindParam(':email', $email);
    $inserindo->bindParam(':senha', $senha);

    if ($inserindo->execute($dadosPDO)) {
        // header('location: cadatrese.php?status=ok');
        echo "Tudo certo, <b>$nome</b>!!<br> Cadasto conclúido, aproveite! 🎊";
    } else {
        // header('location: cadatrese.php?status=erro');
        echo "ERRO PDO";
    }
    }
}