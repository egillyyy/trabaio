<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idservico = 3;

echo "<pre>";
print_r(pesquisarServicoId($conexao, $idservico));
echo "</pre>";
?>