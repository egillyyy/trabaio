<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="formBusca.php">
    Nome do cliente: <br>
    <input type="text" name="nome"> <br><br>

    <input type="submit" value="Pesquisar">
  </form>
  <?php
  if (isset($_GET["nome"]) && !empty($_GET["nome"])) {
    $nome = $_GET["nome"];

    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $clientes = pesquisarUsuarioNome($conexao, $nome) ?? [];
    $agenedamentos = pesquisarAgendamentoId($conexao, $nome) ?? [];

    if (count($clientes) == 0 AND count($agenedamentos) == 0) {
      echo "<p>Nenhum cliente encontrado</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>Data</th>";
      echo "<th>Horário</th>";
      echo "<th>Serviço</th>";
      echo "</tr>";

      foreach ($clientes as $cliente) {
        echo "<tr>";
        echo "<td>" . $cliente["nome"] . "</td>";
        echo "<td></td>";   // Não tem data, horário, serviço aqui, então deixa vazio
        echo "<td></td>";
        echo "<td></td>";
        echo "</tr>";
      }
      foreach ($agenedamentos as $agenedamento) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td>" . $agenedamento["data"] . "</td>";
        echo "<td>" . $agenedamento["horario"] . "</td>";
        echo "<td>" . $agenedamento["tb_servico_id_servico"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  }
  ?>

</body>

</html>