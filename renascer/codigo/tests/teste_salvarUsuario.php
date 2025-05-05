<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $email = "Ian@gmail.com";
    $senha_hash = "123";
    $tipo = "3";
    $nome = "Gabriel";

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome);
?>