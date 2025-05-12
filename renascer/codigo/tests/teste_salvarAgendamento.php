<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

$data = "2025-05-12";
$horario = "14:30:00";
$tb_taxa_idtaxa = 2; 
$tb_servico_id_servico = 2;

    salvarAgendamento($conexao, $data, $horario, $tb_taxa_idtaxa, $tb_servico_id_servico)

?>