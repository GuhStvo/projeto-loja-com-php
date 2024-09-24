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
    <style>
        dialog {
            position: absolute;
            z-index: 2;
            width: 300px;
            height: 200px;
            left: 50%;
            right: 50%;
            transform: translate(-50%, 50%);

            /* display: flex;
            justify-content: center;
            align-items: center; */
            border-radius: 18px;
            text-transform: uppercase;
            color: red;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <header>
        <?php
        // inclui o arquivo na página, include_once verifica se a página já não foi incluída antes
        include_once "menu.php";
        //Isset verifica se uma variável existe
        $erro = isset($_GET['erro']) ? "Login ou senha inválidos" : "";
        $open = isset($_GET['erro']) ? "open" : "";
        ?>
        <dialog <?=$open?>>
            <?php
            echo $erro;
            ?>
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
    <main>
        <div class="conteudo_central">
            <section id="produtos">
                <!-- Produto 1 -->
                <?php
                /* Conexão com banco de dados */
                $con = new PDO(dsn:"mysql:host=localhost;dbname=banco", username:'root', password: '');

                if (!$con) {
                    echo "Problema com a conexão";
                }
                $sql = "SELECT * FROM produtos INNER JOIN categoria ON produtos.id_categoria=categoria .id_categoria ORDER BY produtos.descricao_produto";
                $stmt = $con->prepare($sql);
                $stmt->execute();


                while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nome_produto = $array['nome_produto'];
                    $valor_produto = $array['valor_produto'];
                    $descricao_produto = $array['descricao_produto'];
                    $categoria = $array['id_categoria'];
                    $conteudoImagem = $array['imagem']; // Conteúdo binário da imagem
                    $base64Imagem = base64_encode($conteudoImagem); // Converter para base64
                    echo "
                <div class='card'>
                    <div class='card-header' style='overflow: hidden;'>
                        $nome_produto
                    </div>
                    <div class='card-body'>
                        <a href='detalhes_produto.php'><img style='width: 100%; height: 100%; aspect-ratio: 4/3; object-fit: contain;' src='data:image/jpeg;base64,{$base64Imagem}'></a>
                    </div>
                    <div class='card-footer'>
                        <div class='card-valor'>R$ 2999,90</div>
                        <div class='card-oferta'>R$ $valor_produto,00</div>
                        <div class='btn-comprar'>
                            <a href='add_carrinho.php'>Comprar</a>
                        </div>
                        <div class='star'>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
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