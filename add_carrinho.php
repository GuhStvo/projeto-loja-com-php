<?php
include_once "conexao.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    $novo = [
        'id_usuario' => $id_produto,
        'id_produto' => $id_produto,
        'quantidade' => $quantidade,
        'valor' => $valor
    ];
    
    
    // Precisamos chegcar se já existe carrinho (tabela compra).
    // Se não exister, procedemos o include.
    
    // Primeiro a conexão com o banco.
    $sql = "SELECT * FROM compra WHERE id_usuario=$id_usuario";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $usuario = 0;
    while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $usuario = $array['id_usuario'];
    }
    
    if ($usuario == 0) {
        // Agora incluimos
    
        $insert = $conexao->prepare("INSERT INTO compra (id_usuario, data_compra) VALUES (:id_usuario, CURRENT_DATE)");
        $insert->execute($novo);
    }

}

