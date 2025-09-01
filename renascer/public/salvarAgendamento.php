<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$data = $_POST['data'];
$horario = $_POST['horario'];
$idservico = $_POST['idservico'];
$idcliente = $_POST['idcliente'];
$idfuncionario = $_POST['idfuncionario'];

salvarAgendamento($conexao, $data, $horario, $idservico, $idcliente, $idfuncionario);

header("Location: listarAgendamento.php");
?>