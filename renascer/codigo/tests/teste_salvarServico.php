<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    // Serviço 1
    $preco_servico = "120";
    $tipo_servico = "Maquiagem";
    $descricao_servico = "é de passar no rosto";
    $foto = "foto1";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 2
    $preco_servico = "80";
    $tipo_servico = "Cabelo";
    $descricao_servico = "é de cabelo";
    $foto = "foto2";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 3
    $preco_servico = "110";
    $tipo_servico = "Unhas";
    $descricao_servico = "é de cabelo";    
    $foto = "foto3";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 4
    $preco_servico = "1.200";
    $tipo_servico = "Especial";
    $descricao_servico = "é de passar no rosto";
    $foto = "foto4";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);
?>