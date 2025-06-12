<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    // Agendamento 1

    $data = "2025-06-15";
    $horario = "10:15:00";
    $tb_usuario_idusuario_cliente = 1;
    $tb_usuario_idusuario_funcionario = 2;
    $tb_servico_id_servico = 1;


    salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);

    // // Agendamento 2
    // $data = "2025-06-16";
    // $horario = "11:30:00";
    // $tb_usuario_idusuario_cliente = 1;
    // $tb_usuario_idusuario_funcionario = 2;
    // $tb_servico_id_servico = 2;

    // salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);

    // // Agendamento 3
    // $data = "2025-06-17";
    // $horario = "14:00:00";
    // $tb_usuario_idusuario_cliente = 1;
    // $tb_usuario_idusuario_funcionario = 3;
    // $tb_servico_id_servico = 1;

    // salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);

    // // Agendamento 4
    // $data = "2025-06-18";
    // $horario = "09:00:00";
    // $tb_usuario_idusuario_cliente = 1;
    // $tb_usuario_idusuario_funcionario = 2;
    // $tb_servico_id_servico = 3;

    // salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);

    // // Agendamento 5
    // $data = "2025-06-19";
    // $horario = "15:30:00";
    // $tb_usuario_idusuario_cliente = 1;
    // $tb_usuario_idusuario_funcionario = 3;
    // $tb_servico_id_servico = 2;

    // salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario);        


?>