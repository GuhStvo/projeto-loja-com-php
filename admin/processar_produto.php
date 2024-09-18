<?php
// procassar_produto.php
$con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
if(!$con) {
    echo "Xiii";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $novo = [
        'nome'=> $nome,
        'valor'=> $valor,
        'descr'=> $descricao
    ];
    $insert = $con->prepare("INSERT INTO produtos (nome_produto, valor_produto, descricao_produto) VALUES (:nome, :valor, :descr)");
    // $insert->bindParam('nome', $nome); 
    // $insert->bindParam('valor', $valor);
    // $insert->bindParam('descr', $descricao);
    if($insert->execute($novo)){//retorna true | false
        header('location: cadastrar_produto.php?msg=Cadastrado com sucesso!');
    } else {
        header('location: cadastrar_produto.php?msg=Não foi possivel cadastrar!');
    }
}