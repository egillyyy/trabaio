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

    <title>Listar Pagamento</title>
</head>

<body class="fundo-verde">

    <h1 class="listarU">Lista de Pagamentos</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_pagamento = listarPagamento($conexao);

    if (count($lista_pagamento) == 0) {
        echo "Não existem pagamentos cadastrados.";
    } else {
    ?>
        <div class="table">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Forma</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">ID Agendamento</th>
                        <th scope="col" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($lista_pagamento as $pagamento) {
                        $id = $pagamento['idpagamento'];
                        $valor = $pagamento['valor'];
                        $forma = $pagamento['forma'];
                        $descricao = $pagamento['descricao'];
                        $idagendamento = $pagamento['tb_agendamento_idagendamento'];

                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>R$ $valor</td>";
                        echo "<td>$forma</td>";
                        echo "<td>$descricao</td>";
                        echo "<td>$idagendamento</td>";
                        echo "<td><a href='../codigo/deletarPagamento.php?id=$id'>Excluir</a></td>";
                        echo "<td><a href='formPagamento.php?id=$id'>Editar</a></td>";
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