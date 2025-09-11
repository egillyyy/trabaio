<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    // Serviço 1
    $preco_servico = "30";
    $tipo_servico = "maquiagem";
    $descricao_servico = "é de passar no rosto";
    $foto = "foto1";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 2
    $preco_servico = "50";
    $tipo_servico = "corte de cabelo";
    $descricao_servico = "é de cabelo";
    $foto = "foto2";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 3
    $preco_servico = "80";
    $tipo_servico = "cabelo";
    $descricao_servico = "é de cabelo";    
    $foto = "foto3";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 4
    $preco_servico = "25";
    $tipo_servico = "cabelo";
    $descricao_servico = "é de passar no rosto";
    $foto = "foto4";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 5
    $preco_servico = "100";
    $tipo_servico = "hidratação capilar";
    $descricao_servico = "é de cabelo";    
    $foto = "foto5";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 6
    $preco_servico = "120";
    $tipo_servico = "cabelo";
    $descricao_servico = "é de cabelo";    
    $foto = "foto6";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);

    // Serviço 7
    $preco_servico = "60";
    $tipo_servico = "maquiagem";
    $descricao_servico = "é de passar no rosto";
    $foto = "foto7";
    salvarServico($conexao, $preco_servico, $tipo_servico, $descricao_servico, $foto);
?>