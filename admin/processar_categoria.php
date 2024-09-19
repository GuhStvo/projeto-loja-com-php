<?php
// r
$con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
if(!$con) {
    echo "Xiii";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $novo = [
        'nome'=> $nome
    ];
    $insert = $con->prepare("INSERT INTO categoria 
    (nome_categoria) VALUES (:nome)");
    // $insert->bindParam('nome', $nome); 
    // $insert->bindParam('valor', $valor);
    // $insert->bindParam('descr', $descricao);
    if($insert->execute($novo)){//retorna true | false
        header('location: listar_categorias.php?msg=Cadastrado com sucesso!');
    } else {
        header('location: listar_categorias.php?msg=Não foi possivel cadastrar!');
    }
}