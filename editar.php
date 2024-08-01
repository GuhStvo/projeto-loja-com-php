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
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/form.css">
    <style>
        .btn-comprar {
            padding: .7rem 1rem;
        }
    </style>
</head>

<body>
    <header>
        <?php
        $id = "";
        if (!isset($_GET['id'])) {
            header('location: listar_usuarios.php');
        } else {
            $id = $_GET['id'];
        }
        $dados = [];
        $arquivo = "banco.json";
        if (file_exists($arquivo)) {
            $extrai_dados = file_get_contents($arquivo);
            $dados = json_decode($extrai_dados, true);
        }
        ?>
    </header>
    <main>
        <div class="conteudo_central">
            <section class="formulario_geral">
                <form method="post" action="processar_alteracao.php" id="form_cadastro">
                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                    <h1>ALTERAR</h1>
                    
                    <div class="form_grupo">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form_input" value="<?= $dados[$id]['nome'] ?>">
                    </div>

                    <div class="form_grupo">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form_input" value="<?= $dados[$id]['cpf'] ?>">
                    </div>
                    <div class="form_grupo">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form_input" value="<?= $dados[$id]['email'] ?>">
                    </div>
<!--                     <div class="form_grupo">
                        <label for="senha">Senha</label>
                        <input type="hidden" name="senha" id="senha" class="form_input" value="<?= $dados[$id]['senha'] ?>">
                    </div> -->
                    <div class="form_grupo">
                        <button type="submit" class="form_btn">SALVAR</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <script src="js/menu.js"></script>
</body>

</html>