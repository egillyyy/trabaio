<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idagendamento'])) {
    $idagendamento = $_POST['idagendamento'];
    $agendamento = pesquisarAgendamentoId($conexao, $idagendamento);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Agendamento</title>
</head>
<body>
        <h2>Pesquisar Agendamento</h2>

    <form method="post" action="pesquisarAgendamento.php">
        ID do Agendamento:<br>
        <input type="text" id="idagendamento" name="idagendamento">
        <br><br>
        <button type="submit">Pesquisar</button>
    </form>

    <?php
    if ($agendamento) {
        echo "há esse id";
    } else {
        echo "não há esse id";
    }
    ?>

</body>
</html>