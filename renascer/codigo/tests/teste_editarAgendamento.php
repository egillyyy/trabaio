<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$data = "2025-06-15";
$horario = "15:10:00";
$tb_servico_id_servico = 1;     // ID do serviço existente
$tb_usuario_idusuario_cliente = 1;
$tb_usuario_idusuario_funcionario = 1;
$idagendamento = 1;             // ID do agendamento que você deseja editar

editarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario, $idagendamento);
