<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    // Serviço 1
    $preco_servico = "30";
    $tipo_servico = "maquiagem";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 2
    $preco_servico = "50";
    $tipo_servico = "corte de cabelo";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 3
    $preco_servico = "80";
    $tipo_servico = "penteado";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 4
    $preco_servico = "25";
    $tipo_servico = "sobrancelha";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 5
    $preco_servico = "100";
    $tipo_servico = "hidratação capilar";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 6
    $preco_servico = "120";
    $tipo_servico = "progressiva";
    salvarServico($conexao, $preco_servico, $tipo_servico);

    // Serviço 7
    $preco_servico = "60";
    $tipo_servico = "barba completa";
    salvarServico($conexao, $preco_servico, $tipo_servico);
?>