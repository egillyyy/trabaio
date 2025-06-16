<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    // Taxa 1
    $status = "Sem atraso";
    $taxa = "0.00";
    $tb_agendamento_idagendamento = 1;
    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);

    // Taxa 2
    $status = "Sem atraso";
    $taxa = "0.00";
    $tb_agendamento_idagendamento = 1;
    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);

    // Taxa 3 
    $status = "Atrasado";
    $taxa = "100.00";
    $tb_agendamento_idagendamento = 2;
    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);

    // Taxa 4
    $status = "Sem atraso";
    $taxa = "0.00";
    $tb_agendamento_idagendamento = 3;
    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);

    // Taxa 5
    $status = "Atrasado";
    $taxa = "100.00";
    $tb_agendamento_idagendamento = 4;
    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);

?>