<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $preco_servico = "40.00";
    $tipo_servico = "Cabelo";
    $idservico = "1";
   

    editarServico($conexao, $preco_servico, $tipo_servico, $idservico);
?>


