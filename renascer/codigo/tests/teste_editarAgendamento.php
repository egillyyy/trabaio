<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$data = "2025-06-15";
$horario = "15:15:00";
$tb_taxa_idtaxa = 1;            // ID da taxa existente na tabela tb_taxa
$tb_servico_id_servico = 1;     // ID do serviço existente
$idagendamento = 8;             // ID do agendamento que você deseja editar

editarAgendamento($conexao, $data, $horario, $tb_taxa_idtaxa, $tb_servico_id_servico, $tb_pagamento_idpagamento, $idagendamento);

