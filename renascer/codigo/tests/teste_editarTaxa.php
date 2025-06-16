<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $status = "Sem atraso";
    $taxa = "10.00";
    $idtaxa = 2;
    $tb_agendamento_idagendamento = 1;

    editarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento, $idtaxa);
?>


