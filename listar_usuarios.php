<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar dados JSON</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        th {
            background-color: #ccc3;
        }
    </style>
</head>

<body>
    <h1>Listar dados do banco JSON</h1>
    <?php
    $dados = [];
    $arquivo = "banco.json";
    if (file_exists($arquivo)) {
        $extrai_dados = file_get_contents($arquivo);
        $dados = json_decode($extrai_dados, true);
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $dados[0]['nome'];
            foreach ($dados as $id => $dado) {


            ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$dado['nome']?></td>
                    <td><?=$dado['email']?></td>
                    <td></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>