<nav id="nav">
    <!-- Logo do site -->
    <a href="index.php" class="logo"><i class="icofont-micro-chip icofont-2x"></i></a>
    <ul>
        <li>
            <form action="lista_produtos.php">
                <input type="text" name="pesquisa" id="pesquisa">
                <button type="submit"><i class="icofont icofont-search"></i></button>
            </form>
        </li>
        <li><a href="lista_produtos.php"><i class="icofont-duotone icofont-cube"></i> Produtos</a></li>
        <li><a href="carrinho.php"><i class="icofont-duotone icofont-cart"></i> Carrinho</a></li>
        <?php
        // Verifica se existe uma sessão, se não existir ele inicia uma sessão
        session_start();
        // isset verifica de existe essa variável
        if (isset($_SESSION['email'])) {
            echo '<li id="login"><a href="minha_conta.php"><i class="fa fa-user"></i> Minha conta</a></li>
                    <li id="login"><a href="logout.php"><i class="fa fa-close"></i>Sair</a></li>
                    ';
        } else {
            echo '
                    <li id="cadastrese"><a href="cadastrese.php"><i class="icofont-duotone icofont-add-users"></i>Cadastre-se</a></li>
                    <li id="login"><a href="login.php"><i class="icofont-duotone icofont-unlock"></i> Login</a></li>';
        }
        ?>

    </ul>
    <button id="hamburguer" class="hamburguer"><i class="icofont icofont-navigation-menu"></i></button>
</nav> <!-- Fecha NAV -->