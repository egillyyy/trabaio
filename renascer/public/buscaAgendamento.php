<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisar Agendamentos</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="fundo-verde">
    <h1 id="h1arrumado">Pesquisar Agendamentos</h1>

  <form action="buscaAgendamento.php" class="card card-agendamento p-4 shadow mb-3"> 
    <div class="mb-3">
      <label for="nome" class="form-label">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

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
      echo "<br><table class='table table-success table-striped'>";
      echo "<tr>";
      echo "<th scope='col'>Nome</th>";
      echo "<th scope='col'>Data</th>";
      echo "<th scope='col'>Horário</th>";
      echo "<th scope='col'>Serviço</th>";
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