<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    

    $nome = "Bruna";
    $cpf = "222.222.999-09";
    $telefone = "(62) 94567-8970";
    $idcliente = 1;
    editarCliente($conexao, $nome, $cpf, $telefone, $idcliente);

?>
