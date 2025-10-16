<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$data = $_POST['data'];
$horario = $_POST['horario'];
$idservico = $_POST['idservico'];
$idcliente = $_POST['idcliente'];

$id_agendamento = salvarAgendamento($conexao, $data, $horario, $idservico, $idcliente);


// if tipo == c para aq, se nao 
// -fazre uma pagina pra pagar

header("Location: formPagamento.php?id=$id_agendamento");
?>