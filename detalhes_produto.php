<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/tech_icon.ico" type="image/x-icon">
    <title>LojaTech Tecnologias e mais</title>
    <link rel="stylesheet" href="icofont/icofont.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/produtos.css">
</head>

<body>
    <header>
        <?php
        // Inclui o arquivo na página, include_once verifica se a página
        include_once "menu.php";
        ?>
    </header>
    <center>
        <?php

        if (isset($_SESSION['nome'])) {
            echo "<h2>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!</h2>";
            $id_usuario = $_SESSION['id_usuario'];
        } else {
            echo "<p>Nome não encontrado na sessão.</p>";
        }
        ?>
    </center>
    <main>
        <?php
        $con = new PDO("mysql:host=localhost;dbname=banco", 'root', '');
        $id_produto = $_GET["id_produto"];

        $sql = "SELECT * FROM produtos INNER JOIN categoria ON produtos.id_categoria=categoria.id_categoria WHERE id_produto = $id_produto";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        // laço para exibição de todos os registros que a query trouxe    
        while ($array = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id_produto = $array['id_produto'];
            $nome_produto = $array['nome_produto'];
            $valor_produto = $array['valor_produto'];
            $nome_categoria = $array['nome_categoria'];
            $desc_produto = $array['descricao_produto'];
            // convertendo o código para imagem
            $conteudoImagem = $array['imagem']; // Conteúdo binário da imagem
            $base64Imagem = base64_encode($conteudoImagem); // Converter para base64 
            // aspa dupla vem antes da aspa simples (hierarquia)  
        }
        ?>

        <div class="conteudo_central">
            <section id="produtos">
                <div class="fotos">
                    <div class="foto_principal">
                        <?php
                        if ($conteudoImagem != '') {
                            echo "<img id='imgs-produto-detalhe' src='data:image/jpeg;base64,{$base64Imagem}' width='200px' alt='$nome_produto' />";
                        }
                        ?>
                    </div>
                    <div class="galeria">
                        <!--                    <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone"> -->
                    </div>
                </div>
                <div class="container_descricao">
                    <h1>
                        <?php
                        echo $nome_produto
                        ?>
                    </h1>
                    <div class="container_detalhes">
                        <?php
                        $valorFormatado = number_format($valor_produto, 2, ',', '.')
                        ?>
                        <div>10% desconto no PIX</div>
                        <div>Parcelamento sem juros</div>
                        <?php
                        for ($i = 1; $i < 6; $i++) {
                            $parcelamento = $valor_produto / $i;
                            echo '<div>' . $i . ' X ' . number_format($parcelamento, 2, ',', '.') . 's/ juros</div>';
                        }
                        ?>
                    </div>
                    <div class="container_footer">
                        <div class="container_valor">
                            <div class="card-valor">
                                <?php
                                $desconto = $valor_produto * 0.1;
                                echo "RS " . number_format($valor_produto + $desconto, 2, ',', '.')
                                ?>
                            </div>
                            <div class="card-oferta">
                                <?php
                                echo "R$ $valorFormatado";
                                ?>
                            </div>
                        </div>

                        <form action="add_carrinho.php" method="post" id="carrinho">
                            <!-- Pegando id do produto -->
                            <input class="form-input" type="text" name="id_produto" id="id_produto" value="<?php echo $id_produto?>" disabled>
                            <!-- Pegando id do usuário -->
                            <input class="form-input" type="text" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario?>" disabled>
                            <div>
                            <input class="form-input" type="text" name="valor" id="valor" value="<?php echo $valor_produto?>" disabled>
                            <div>
                                <label for="qauntidade">Quantidade</label>
                                <input class="form-input" type="number" name="quantidade" id="quantidade">
                            </div>
                            <button class="btn-comprar" type="submit">Comprar</button>
                        </form>

                    </div>
                </div>
            </section>
            <section>
                <ul class="tabs_menu">
                    <li data-id="#tab1" class="active">Tab 1</li>
                    <li data-id="#tab2">Tab 2</li>
                    <li data-id="#tab3">Tab 3</li>
                    <li data-id="#tab4">Tab 4</li>
                </ul>
                <div class="tabs_item active" id="tab1">
                    <div class="tab_conteudo">
                        <?php
                        echo $desc_produto;
                        ?>
                    </div>
                </div>
                <div class="tabs_item" id="tab2">
                    <div class="tab_conteudo">
                        Tab 2
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates in laborum nihil nulla maiores suscipit laboriosam harum quos rem, quidem nemo unde saepe expedita neque aperiam repellat assumenda perspiciatis iusto!
                    </div>
                </div>
                <div class="tabs_item" id="tab3">
                    <div class="tab_conteudo">
                        Tab 3
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates in laborum nihil nulla maiores suscipit laboriosam harum quos rem, quidem nemo unde saepe expedita neque aperiam repellat assumenda perspiciatis iusto!
                    </div>
                </div>
                <div class="tabs_item" id="tab4">
                    <div class="tab_conteudo">
                        Tab 4
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates in laborum nihil nulla maiores suscipit laboriosam harum quos rem, quidem nemo unde saepe expedita neque aperiam repellat assumenda perspiciatis iusto!
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php
    include_once "footer.php";
    ?>
    <script src="js/menu.js"></script>
    <script src="js/tabs.js"></script>
</body>

</html>