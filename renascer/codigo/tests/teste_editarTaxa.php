<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $status = "Sem atraso";
    $taxa = "0.00";
    $idtaxa = "1";

    editarTaxa($conexao, $status, $taxa, $idtaxa);
?>


