<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$agendamento_pesquisado = "1";
$agendamentos = pesquisarTabelaAgendamento($conexao, $agendamento_pesquisado);

foreach ($agendamentos as $agendamento) {
    echo $agendamento["data"] . " - " . $agendamento["horario"] . $agendamento["tb_servico_id_servico"] . " - " . $agendamento["tb_usuario_idusuario"] . "<br>";}
?>
