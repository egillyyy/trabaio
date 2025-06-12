<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $data = "2025-05-12";
    $horario = "14:30:00";
    $tb_usuario_idusuario_cliente = 1;       
    $tb_usuario_idusuario_funcionario = 2;   
    $tb_servico_id_servico = 1;             


    salvarAgendamento($conexao, $data, $horario, $tb_servico_id_servico, $tb_usuario_idusuario_cliente, $tb_usuario_idusuario_funcionario)

?>