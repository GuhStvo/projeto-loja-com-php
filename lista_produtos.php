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
                $i = 1;
                while($i < 15) {
                echo '
                <div class="card">
                    <div class="card-header">
                        Smartphone Samsung A54
                    </div>
                    <div class="card-body">
                        <a href="detalhes_produto.php"><img src="img/celularA54.jfif" width="200"></a>
                    </div>
                    <div class="card-footer">
                        <div class="card-valor">R$ 2999,90</div>
                        <div class="card-oferta">R$ 2599,90</div>
                        <div class="btn-comprar">
                            <a href="add_carrinho.php">Comprar</a>
                        </div>
                        <div class="star">
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                            <span>&#9734;</span>
                        </div>
                    </div>
                </div>';
                $i++;
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