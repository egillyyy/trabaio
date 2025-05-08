<?php

require_once "../conexao.php";
require_once "../funcoes.php";

$idusuario = 1;

echo "<pre>";
print_r(pesquisarUsuarioId($conexao, $idusuario));
echo "</pre>";
?>