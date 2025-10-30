<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>pagamentp</title>
</head>
<body class="fundo-verde">

    <h1 id="h1arrumado">Lista de Pagamentos</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_pagamento = listarPagamento($conexao);

    if (count($lista_pagamento) == 0) {
        echo "Não existem pagamentos cadastrados.";
    } else {
    ?>
        <table class="table table-success table-striped">
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Forma</th>
                <th>Descrição</th>
                <th>ID agendamento</th>
                <th colspan="2">Ações</th>
            </tr>
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
                echo "<td><a href='deletarPagamento.php?id=$id'>Excluir</a></td>";
                echo "<td><a href='formPagamento.php?id=$id'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>
  
</body>
</html>
