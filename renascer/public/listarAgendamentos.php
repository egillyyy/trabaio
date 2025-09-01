<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agendamento</title>
</head>
<body>

    <h1>Lista de Agendamentos</h1>


    <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_agendamento = listarAgendamento($conexao);

    if (count($lista_agendamento) == 0) {
        echo "Não existem agendamentos cadastrados.";
    } else {
    ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Horário</th>
                <th>ID Serviço</th>
                <th>ID Cliente</th>
                <th>ID Funcionário</th>
                <th colspan="2">Ações</th>
            </tr>
            <?php
            foreach ($lista_agendamento as $agendamento) {
                $id = $agendamento['idagendamento'];
                $data = $agendamento['data'];
                $horario = $agendamento['horario'];
                $idservico = $agendamento['tb_servico_id_servico'];
                $idcliente = $agendamento['tb_usuario_idusuario_cliente'];
                $idfuncionario = $agendamento['tb_usuario_idusuario_funcionario'];

                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$data</td>";
                echo "<td>$horario</td>";
                echo "<td>$idservico</td>";
                echo "<td>$idcliente</td>";
                echo "<td>$idfuncionario</td>";
                echo "<td><a href='deletarAgendamento.php?id=$id'>Excluir</a></td>";
                echo "<td><a href='formAgendamento.php?id=$id'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>
  
</body>
</html>

