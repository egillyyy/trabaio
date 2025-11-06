<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

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

    $agendamentos = pesquisarAgendamentosPorNome($conexao, $nome);  

    if (count($agendamentos) == 0) {
      echo "<p>Nenhum cliente encontrado</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>Nome</th>";
      echo "<th>Data</th>";
      echo "<th>Horário</th>";
      echo "<th>Serviço</th>";
      echo "</tr>";
      }

      foreach ($agendamentos as $agendamento) {
        echo "<tr>";
        echo "<td>" . $agendamento["nome"] . "</td>";
        echo "<td>" . $agendamento["data"] . "</td>";
        echo "<td>" . $agendamento["horario"] . "</td>";
        echo "<td>" . $agendamento["servico"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  ?>

</body>

</html>