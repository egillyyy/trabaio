<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $preco_servico = "30";
    $tipo_servico = "maquiagem";

    salvarServico($conexao, $preco_servico, $tipo_servico);
?>