<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $valor = "100.00";
    $forma = "Pix";
    $descricao = "Feito pela cliente Ana";
    $tb_agendamento_idagendamento = "1";

    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);
?>