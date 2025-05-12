<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $status = "Sem atraso";
    $taxa = "1.00";

    salvarTaxa($conexao, $status, $taxa);
?>