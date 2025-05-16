<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $email = "teste2@gmail.com";
    $senha_hash = "321";
    $tipo = "2";
    $nome = "bbbb";
    $telefone = "62 99008888";

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);
?>