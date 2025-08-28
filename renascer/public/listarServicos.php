<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Serviços</h1>

     <?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $lista_servicos = listarServico($conexao);

    if (count($lista_servicos) == 0) {
        echo "Não existem serviços cadastrados.";
    } else {
    ?>
        <table border ="1">
            <tr>
                <th>ID</th>
                <th>Preço Serviço</th>
                <th>Tipo Serviços</th>

                <th colspan="2">Ações</th>
            </tr>
            <?php
            foreach ($lista_servicos as $servico) {
                $id = $servico['idservico'];
                $preco_servico = $servico['preco_servico'];
                $tipo_servico = $servico['tipo_servico'];


                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>R$ $preco_servico</td>";
                echo "<td>$tipo_servico</td>";
                echo "<td><a href='deletarServico.php?id=$id'>Excluir</a></td>";
                echo "<td><a href='editarServico.php?id=$id'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>
  


    
</body>
</html>
