<?php

require_once "../conexao.php"; //conectar com o BD
require_once "../funcoes.php"; //conectar com o arquivo funções

echo "<pre>"; // formatar texto para quebrar linhas
print_r(listarUsuario($conexao)); //Chama a função listarClientes. Print_r → Mostra o conteúdo do array de forma estruturada (fica fácil de entender o resultado). //Se for só texto → print. Se for array ou objeto → print_r
echo "</pre>";
?>