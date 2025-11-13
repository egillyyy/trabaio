<?php
require_once "../codigo/verificarLogado.php";
$tipo = $_SESSION['tipo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Listar Serviços</title>
</head>

<body class="fundo-verde">


    <h1 class="listarU">Lista de Serviços</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_servicos = listarServico($conexao);

    if (count($lista_servicos) == 0) {
        echo "Não existem serviços cadastrados.";
    } else {
    ?>
        <div class="table">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Preço Serviço</th>
                        <th scope="col">Tipo Serviço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($lista_servicos as $servico) {
                        $id = $servico['idservico'];
                        $preco_servico = $servico['preco_servico'];
                        $tipo_servico = $servico['tipo_servico'];

                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>R$ $preco_servico</td>";
                        echo "<td>$tipo_servico</td>";
                        echo "<td><a href='../codigo/deletarServico.php?id=$id'>Excluir</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>

    <button type="submit"> <a class="linkBranco" href="servicos.php">Volta</a></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>