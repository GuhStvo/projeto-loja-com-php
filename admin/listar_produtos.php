<?php
//session_start();
//$status = isset($_SESSION['status']) ? $_SESSION['status'] : 0;
//if (isset($_SESSION['email']) && $status > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/tech_icon.ico" type="image/x-icon">
    <title>LojaTech Tecnologias e mais</title>
    <link rel="stylesheet" href="../icofont/icofont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/produtos.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <header>
        <?php include_once "./menu_admin.php"; ?>
    </header>
    <main>
        <div class="conteudo_central">
            <?php
            $con = new PDO(
                "mysql:host=localhost;dbname=banco",
                'root',
                ''
            );
            if (!$con) {
                echo "Problema com conexão";
            }
            ?>
            <center>
                <a href="cadastrar_produto.php" class="form_btn">Novo Produto</a>
                <br />
                <br />
                <table border="1">
                    <thead>
                        <tr>
                            <th>Nro Produto</th>
                            <th>Nome Produto</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <?php
                    $pesquisa = $_GET['pesquisa'];
                    $parametro='';
                    if($pesquisa!= '') {
                        $parametro = "SELECT * FROM produtos INNER JOIN catgoria ON produtos.id_categoria=categoria.id_categoria $parametro ORDER BY produto.descricao_produto";
                    }

                    $sql = "SELECT * FROM produtos INNER JOIN categoria ON produtos.id_categoria=categoria .id_categoria ORDER BY produtos.descricao_produto";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();

                    while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $id_produto = $array['id_produto'];
                        $nome_produto = $array['nome_produto'];
                        $valor_produto = $array['valor_produto'];
                        $categoria_produto = $array['nome_categoria']
                    ?>
                        <tr>
                            <!-- ID do Produto -->
                            <td style="width:100px; text-align: center;">
                                <?php echo $id_produto; ?>
                            </td>
                            <!-- Nome do produto -->
                            <td style="width:300px; text-align: center;">
                                <?php echo $nome_produto; ?>
                            </td>
                            <!-- Categoria do produto -->
                            <td style="width: 300px; text-align: center;">
                                <?php echo $categoria_produto ?>
                            </td>
                            <!-- Valor do produto -->
                            <td style="width:200px; text-align: right;">
                                <?php echo 'R$ ' . number_format($valor_produto, 2, ',', '.'); ?>
                            </td>
                            <td style="width:100px; text-align: center;">
                                <a href="editar_produto.php?id_produto=<?php echo $id_produto ?>" class="form_btn">Editar</a>
                            </td>
                            <td style="width:100px; text-align: center;"><a href="#" class="form_btn">Excluir</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </center>
        </div>
    </main>
    <?php include_once "../footer.php"; ?>
    <script src="../js/menu.js"></script>
</body>

</html>
<?php
//} else {
//    header('Location: ../');
//}
?>