<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idagendamento = 2;

echo "<pre>";
print_r(pesquisarAgendamentoId($conexao, $idagendamento));
echo "</pre>";
?>
