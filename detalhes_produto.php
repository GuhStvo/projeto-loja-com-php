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
    <main>
        <div class="conteudo_central">
            <section id="produtos">
                <div class="fotos">
                    <div class="foto_principal">
                        <img src="img/sansung23.jpeg" width="280" alt="Smartphone">
                    </div>
                    <div class="galeria">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                        <img src="img/sansung23.jpeg" width="70" alt="Smartphone">
                    </div>
                </div>
                <div class="container_descricao">
                    <h1>
                        Smartphone Samsung Galaxy S23 FE 5G 128GB, 8GB RAM, Inteligência Artificial, Câmera Tripla,
                        Selfie de 10MP, Tela 6.4" Exynos 2200 Octa Core - Azul
                    </h1>
                    <div class="container_detalhes">
                        <div>10% desconto no PIX</div>
                        <div>Parcelamento sem juros</div>
                        <div>1 X 3499,00 s/ juros</div>
                        <div>2 X 1749,50 s/ juros</div>
                        <div>3 X 874,75 s/ juros</div>
                        <div>4 X 437,38 s/ juros</div>
                        <div>5 X 218,69 s/ juros</div>
                    </div>
                    <div class="container_footer">
                        <div class="container_valor">
                            <div class="card-valor">R$ 4.499</div>
                            <div class="card-oferta">R$ 3.499</div>
                        </div>
                        <div class="btn-comprar"><a href="add_carrinho.php">Comprar</a></div>
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
                        Tab 1
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates in laborum nihil nulla maiores suscipit laboriosam harum quos rem, quidem nemo unde saepe expedita neque aperiam repellat assumenda perspiciatis iusto!
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