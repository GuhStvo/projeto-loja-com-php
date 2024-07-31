<?php
$dados = [];
$arquivo = 'banco.json';
if($_SERVER['REQUEST_METHOD'] == 'POST') { // Quando clicar e formulário for enviado
    if(file_exists($arquivo)) {
        $extrai_dados = file_get_contents($arquivo);
        // Extrair dados e transforma em um array associativo, sem o 'true ele extrai um objeto
        $dados = json_decode($extrai_dados, true); // Decodificar arquivo json
    }
    // pegar esses dados 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['senha'];
    $senha = $_POST['senha'];
    // Criptografa a senha digitada pelo usuário
    // Cria um código de 60 caracteres com a senha
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    
    $novo_usuario = [
        'nome' => $nome,
        'email' => $email,
        'cpf' => $cpf,
        'senha' => $senha_criptografada
    ];

    $dados[] = ($novo_usuario);
    // Inserir dados dentro de um arquivo, passando nome do arquivo e dados a serem guardados
    if (file_put_contents($arquivo, json_encode($dados))) {
        header('location: cadastrese.php');
    } else {
        echo "Deu ruim";
    }
    // json_encode codifica em um arquivo json

    // echo "<h1>Dados</h1>";
    // echo "Nome: $nome<br>";
    // echo "E-mail: $email<br>";
    // echo "CPF: $cpf<br>";
    // echo "Senha: $senha => $senha_criptografada<br>";
}