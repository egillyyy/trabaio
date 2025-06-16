<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    // Pagamento 1
    $valor = "100.00";
    $forma = "Pix";
    $descricao = "Feito pela cliente Ana";
    $tb_agendamento_idagendamento = 1;
    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

    // Pagamento 2
    $valor = "150.00";
    $forma = "Dinheiro";
    $descricao = "Pagamento adiantado do cliente João";
    $tb_agendamento_idagendamento = 2;
    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

    // Pagamento 3
    $valor = "200.50";
    $forma = "Cartão de Crédito";
    $descricao = "Cliente Marina pagou no crédito";
    $tb_agendamento_idagendamento = 3;
    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

    // Pagamento 4
    $valor = "80.00";
    $forma = "Cartão de Débito";
    $descricao = "Serviço rápido pago pela cliente Carla";
    $tb_agendamento_idagendamento = 4;
    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

    // Pagamento 5
    $valor = "100.00";
    $forma = "Pix";
    $descricao = "Feito pela cliente Ana";
    $tb_agendamento_idagendamento = 5;
    salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

?>