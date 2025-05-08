<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $preco_servico = "100";
    $tipo_servico = "Unha";

    salvarServico($conexao, $preco_servico, $tipo_servico);
?>