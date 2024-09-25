<?php 
include "./admin/conexao.php";
/* $con = new PDO("mysql:host=localhost;dbname=banco", 'root', ''); */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Pegou os dados do formulário */
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $erro = "";

    /* Verificação do nome */
    $padraoNome = '~^[A-Za-zÀ-ÖØ-öø-ÿ]+(?: [A-Za-zÀ-ÖØ-öø-ÿ]+)*$~';
    if (empty($nome)) {
        $erro .= "Preencha o campo nome.<br>";
    } else if(strlen($nome) < 3) {
        $erro .= "O nome necessita de no mínimo 3 caracteres.<br>";
    } else if (!preg_match($padraoNome, $nome)) {
        $erro .= "Digite apenas letras, não números <br>";
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
    $padraoSenha = '~(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*\(\)\_\+\[\]\{\}\|\:\"\<\>\.\,\/\?\-]).{8,}$~';
    if (empty($senha)) {
        $erro .= "Preencha o campo senha.<br>";
    } else if(!preg_match($padraoSenha, $senha)) {
        $erro .= "Preencha o campo senha corretamente.<br>";
    } else {
        $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    }

    echo $erro;
    if($erro == "") {
        /* Novo dados para o para inserção de pdo */
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


    $partes = explode(' ', $nome);
    $primeiroNome = $partes[0];

    if ($inserindo->execute($dadosPDO)) {
        // header('location: cadatrese.php?status=ok');
        echo "Tudo certo, <b>$primeiroNome</b>!!<br> Cadasto conclúido, aproveite! 🎊";
    } else {
        // header('location: cadatrese.php?status=erro');
        echo "ERRO PDO";
    }
    }
}