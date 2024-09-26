<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/tech_icon.ico" type="image/x-icon">
    <title>LojaTech Tecnologias e mais</title>
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/produtos.css">
</head>

<body>
    <header>
    <?php 
            include_once "menu.php"
        ?>

        <section class="carrossel">
            <div class="container">
                <form method="post">
                    <input type="text" id="nome" name="nome" placeholder="Por nome">
                    <select name="categoria">
                        <option value="">Categoria</option>
                        <option value="1">Smartphone</option>
                        <option value="2">Eletrônico</option>
                        <option value="3">Acessórios</option>
                    </select>
                    <input type="number" id="valor" name="valor" placeholder="Por valor" step="0.01">
                    <button type="submit">Filtar</button>
                </form>
            </div>
        </section>
    </header>
    <main>
        <div class="conteudo_central">
        <section id="produtos">
                <!-- Produto 1 -->
                <?php
                // Conexão com o banco de dados - Não copiar o que está em cinza
                $con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
                // Consulta do produtos relacionado com a tabela de categorias

                $pesquisa = $_GET['pesquisa'];
                $sql = "SELECT * FROM produtos INNER JOIN categoria ON produtos.id_categoria=categoria.id_categoria WHERE nome_produto LIKE '%$pesquisa%' ORDER BY produtos.descricao_produto";
                $stmt = $con->prepare($sql);
                $stmt->execute();      
                // laço para exibição de todos os registros que a query trouxe    
                while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id_produto = $array['id_produto'];
                    $nome_produto = $array['nome_produto'];
                    $valor_produto = $array['valor_produto'];
                    $nome_categoria = $array['nome_categoria'];
                    // convertendo o código para imagem
                    $conteudoImagem = $array['imagem']; // Conteúdo binário da imagem
                    $base64Imagem = base64_encode($conteudoImagem); // Converter para base64 
                    // aspa dupla vem antes da aspa simples (hierarquia)                   
                    echo "
                    <div class=\"card\">
                        <div class=\"card-header\">
                            $nome_produto
                        </div>
                        <div class=\"card-body\">
                            <a href=\"detalhes_produto.php\">";
                            if ($conteudoImagem != '') {
                             echo "<img src='data:image/jpeg;base64,{$base64Imagem}' width='200px' />";
                            }
                            echo "      </a>
                        </div>
                        <div class=\"card-footer\">
                            <div class=\"card-valor\">R$ " 
                            . number_format($valor_produto, 2, ',', '.') 
                            . "</div>
                            <div class=\"card-oferta\">R$ " 
                            . number_format($valor_produto, 2, ',', '.') 
                            . "</div>
                            <div class=\"btn-comprar\">
                                <a href=\"#\">Comprar</a>
                            </div>
                            <div class=\"star\">
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                                <span>☆</span>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </section>
        </div>
    </main>
    <?php
        include_once "footer.php";
    ?>
    <script src="js/menu.js"></script>
</body>

</html>