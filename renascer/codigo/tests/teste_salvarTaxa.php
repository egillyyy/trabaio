<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $status = "Sem atraso";
    $taxa = "1.00";
    $tb_agendamento_idagendamento = "1";

    salvarTaxa($conexao, $status, $taxa, $tb_agendamento_idagendamento);
?>