<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$nome_pesquisado = "a";
$usuarios = pesquisarUsuarioNome($conexao, $nome_pesquisado);

foreach ($usuarios as $usuario) {
   echo $usuario["nome"] . "<br>";
}
?>
