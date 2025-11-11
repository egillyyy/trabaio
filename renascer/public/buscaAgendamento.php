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
  <div class="container text-center mt-4">
    <h1 class="pesquisarA">Pesquisar Agendamentos</h1>

    <br>

    <form action="buscaAgendamento.php" class="card card-agendamento p-4 shadow mx-auto mb-4">
      <div class="mb-3 text-start">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>

      <input type="submit" class="btn btn-secondary w-100" value="Pesquisar">
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
        echo "<div class='table-responsive'>";
        echo "<table class='table table-success table-striped mx-auto' style='width:80%;'>";
        echo "<thead><tr>";
        echo "<th>Nome</th>";
        echo "<th>Data</th>";
        echo "<th>Horário</th>";
        echo "<th>Serviço</th>";
        echo "</tr></thead><tbody>";
      }

      foreach ($agendamentos as $agendamento) {
        echo "<tr>";
        echo "<td>" . $agendamento["nome"] . "</td>";
        echo "<td>" . $agendamento["data"] . "</td>";
        echo "<td>" . $agendamento["horario"] . "</td>";
        echo "<td>" . $agendamento["servico"] . "</td>";
        echo "</tr>";
      }
      echo "</tbody></table></div>";
    }
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="funcoes.js"></script>
</body>

</html>