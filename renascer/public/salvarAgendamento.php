<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$data = $_POST['data'];
$horario = $_POST['horario'];
$idservico = $_POST['idservico'];
$idcliente = $_POST['idcliente'];

salvarAgendamento ($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario);

header("Location: listarAgendamento.php");
?>