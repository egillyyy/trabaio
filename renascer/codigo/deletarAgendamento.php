<?php
require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // tenta deletar
    if (deletarAgendamento($conexao, $id)) {
        echo "Agendamento excluído com sucesso!";

    } else {
        echo "Erro ao excluir o agendamento.";
    }
} else {
    echo "ID não informado.";

}
?>
<br><br>
<a href="../public/listarAgendamentos.php">Voltar para lista</a>
