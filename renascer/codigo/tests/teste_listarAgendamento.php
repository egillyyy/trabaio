<?php

require_once "../conexao.php"; //conectar com o BD
require_once "../funcoes.php"; //conectar com o arquivo funôes

echo "<pre>";
print_r(listarAgendamento($conexao));
echo "</pre>";
?>