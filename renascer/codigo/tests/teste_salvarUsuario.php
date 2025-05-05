<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $email = "inso@gmail.com";
    $senha_hash = "321";
    $tipo = "1";
    $nome = "aaaa";
    $telefone = "62 99009571";
    $cpf = "000.467.666-00";

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone, $cpf);
?>