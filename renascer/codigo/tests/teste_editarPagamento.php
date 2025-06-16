<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $valor = "100.00";
    $forma = "Cartão";
    $descricao = "Feito pela cliente Ana";
    $tb_agendamento_idagendamento = "1";
    $idpagamento = "1";

    editarPagamento ($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento, $idpagamento);
?>


