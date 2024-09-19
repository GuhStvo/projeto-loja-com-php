<?php
// session_start();
// $status = isset($_SESSION['status']) ? $_SESSION['status'] : 0;
// if (isset($_SESSION['email']) && $status > 0) {

try {
    // Conexão com o banco de dados
    $con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Problema com a conexão: " . $e->getMessage();
    exit;
}

// Dados do formulário
$id_categoria = $_POST["id_categoria"];
$nome_categoria = $_POST["nome_categoria"];

// Verificar se a imagem foi enviada
    // Adicionar o conteúdo da imagem ao array de dados para o update
    $novo = [
        'id_categoria' => $id_categoria,
        'nome_categoria' => $nome_categoria
    ];

    // Query de update com o campo imagem (como BLOB)
    $update = $con->prepare("UPDATE categoria SET 
        nome_categoria = :nome_categoria 
        WHERE id_categoria = :id_categoria");
    // Executa a query e verifica o resultado
    if ($update->execute($novo)) {
        header('location: listar_categorias.php?msg=Alterado com sucesso!');
    } else {
        header('location: listar_categorias.php?msg=Não foi possível alterar!');
    }


// } else {
//    header('location: login.php?msg=Você precisa estar logado para acessar esta página.');
// }
?>
