<?php
$host = "localhost";
$banco = "lojatech";
$user = "root";
$senha = "";
// Conexão com banco de dados usando PDO
$conexao = new PDO("mysql:host=$host;dbname=$banco", $user, $senha);
if (!$conexao) {
    echo "Poxaaa!! Deu ruim com a conexão ao banco de dados";
}