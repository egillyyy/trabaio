<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

// tenta deletar
if (deletarServico($conexao, $id)) {
    echo "Serviço excluído com sucesso!";
} else {
    echo "Não foi possível excluir: este serviço está ligado a um agendamento.";
}
?>
<br><br>
<a href="../public/listarServicos.php">Voltar para lista</a>