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
$id_produto = $_POST["id_produto"];
$nome_produto = $_POST["nome_produto"];
$valor_produto = $_POST["valor_produto"];
$descricao_produto = $_POST["descricao_produto"];
$imagem = $_FILES["imagem"];

// Verificar se a imagem foi enviada
if ($imagem['error'] == UPLOAD_ERR_OK) {
    // Ler o conteúdo do arquivo de imagem
    $conteudo_imagem = file_get_contents($imagem['tmp_name']);

    // Adicionar o conteúdo da imagem ao array de dados para o update
    $novo = [
        'id_produto' => $id_produto,
        'nome_produto' => $nome_produto,
        'valor_produto' => $valor_produto,
        'descricao_produto' => $descricao_produto,
        'imagem' => $conteudo_imagem
    ];

    // Query de update com o campo imagem (como BLOB)
    $update = $con->prepare("UPDATE produtos SET 
        nome_produto = :nome_produto, 
        valor_produto = :valor_produto, 
        descricao_produto = :descricao_produto,
        imagem = :imagem
        WHERE id_produto = :id_produto");

    // Definir o tipo de dado para o campo imagem
    $update->bindParam(':imagem', $conteudo_imagem, PDO::PARAM_LOB);

    // Executa a query e verifica o resultado
    if ($update->execute($novo)) {
        header('location: listar_produtos.php?msg=Alterado com sucesso!');
    } else {
        header('location: listar_produtos.php?msg=Não foi possível alterar!');
    }
} else {
    echo "Erro no upload da imagem!";
}

// } else {
//    header('location: login.php?msg=Você precisa estar logado para acessar esta página.');
// }
?>
