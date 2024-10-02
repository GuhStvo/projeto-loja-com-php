

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
        include_once "menu.php";
        $erro = isset($_GET['erro']) ? "Login ou senha inválidos" : "";
        $open = isset($_GET['erro']) ? "open" : "";
        ?>
        <dialog <?= $open ?>>
            <?php
            echo $erro;
            ?>
            <button id="fechar">OK</button>
        </dialog>
        <section class="carrossel">
            <div class="imagem-container">
                <img src="img/carrossel.png" alt="Carrossel LojaTech" width="800">
                <div class="legenda">
                    <i class="icofont-duotone icofont-cart icofont-3x"></i>
                    <span>
                        <h1>Bem vindo à LojaTech</h1>
                        <p>Satisfação a cada click</p>
                    </span>
                </div>
            </div>
        </section>
    </header>
    <center>
    <?php
    
    if (isset($_SESSION['nome'])) {
        echo "<h2>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!</h2>";
        $id_usuario=$_SESSION['id_usuario'];
   
    } else {
        echo "<p>Nome não encontrado na sessão.</p>";
    }
    ?>   
    </center>           
    <main>
        <div class="conteudo_central">
            <section id="produtos">
                <!-- Produto 1 -->
                <?php
                // Conexão com o banco de dados - Não copiar o que está em cinza
                $con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
                if (!$con) {
                   echo "Problema com conexão";
                }
                // Consulta do produtos relacionado com a tabela de categorias
                $sql = "SELECT * FROM produtos INNER JOIN categoria ON produtos.id_categoria=categoria.id_categoria ORDER BY produtos.descricao_produto";
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
                    <div class=\"card\" >
                        <div class=\"card-header\" title=\"$nome_produto\">
                            $nome_produto
                        </div>
                        <div class=\"card-body\">
                            <a href=\"detalhes_produto.php?id_produto=$id_produto\">";
                            if ($conteudoImagem != '') {
                             echo "<img src='data:image/jpeg;base64,{$base64Imagem}' width='200px' />";
                            }
                            echo "      </a>
                        </div>
                        <div class=\"card-footer\">
                            <div class=\"card-valor\">R$ " 
                            . number_format($valor_produto + ($valor_produto * 0.1), 2, ',', '.') 
                            . "</div>
                            <div class=\"card-oferta\">R$ " 
                            . number_format($valor_produto, 2, ',', '.') 
                            . "</div>
                                <a class=\"btn-comprar\" href=\"detalhes_produto.php?id_produto=$id_produto\">
                                    Comprar
                                </a>
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
            <div class="btn_listar">
                <a href="lista_produtos.php">Listar Produtos</a>
            </div>
        </div>
    </main>
    <?php
    include_once "footer.php";
    ?>
    <script src="js/menu.js"></script>
</body>

</html>
