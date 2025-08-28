<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagamentp</title>
</head>
<body>

    <h1>Lista de Pagamentos</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_pagamento = listarPagamento($conexao);

    if (count($lista_pagamento) == 0) {
        echo "Não existem pagamentos cadastrados.";
    } else {
    ?>
        <table border ="1">
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
