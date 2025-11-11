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
    <title>Listar Agendamentos</title>
</head>

<body class="fundo-verde">

    <h1 class="listarU">Lista de Agendamentos</h1>

    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_agendamento = listarAgendamento($conexao);

    if (count($lista_agendamento) == 0) {
        echo "Não existem agendamentos cadastrados.";
    } else {
    ?>
        <div class="table">
            <table class="table table-striped table-success">
                <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Cliente</th>
                        <th scope="col" colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($lista_agendamento as $agendamento) {
                        $id = $agendamento['idagendamento'];
                        $data = $agendamento['data'];
                        $horario = $agendamento['horario'];
                        $servico = $agendamento['nome_servico'];
                        $cliente = $agendamento['nome_cliente'];

                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$data</td>";
                        echo "<td>$horario</td>";
                        echo "<td>$servico</td>";
                        echo "<td>$cliente</td>";
                        echo "<td><a href='../codigo/deletarAgendamento.php?id=$id''>Excluir</a></td>";
                        echo "<td><a href='formAgendamento.php?id=$id'>Editar</a></td>";
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