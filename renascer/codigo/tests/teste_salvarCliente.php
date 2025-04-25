<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Manuel";
    $cpf = "321.477.809-21";
    $telefone = "(62) 98585-9947";

    salvarCliente($conexao, $nome, $cpf, $telefone);
?>