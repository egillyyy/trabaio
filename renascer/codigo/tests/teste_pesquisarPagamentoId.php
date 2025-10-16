<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idpagamento = 5;

echo "<pre>";
print_r(pesquisarPagamentoId($conexao, $idpagamento));
echo "</pre>";
?>