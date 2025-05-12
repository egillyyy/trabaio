<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $valor = "100.00";
    $forma = "Cartão";
    $descricao = "Feito pela cliente Ana";
    $idpagamento = "1";

    editarPagamento ($conexao, $valor, $forma, $descricao, $idpagamento);
?>


