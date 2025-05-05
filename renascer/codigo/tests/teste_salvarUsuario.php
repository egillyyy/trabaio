<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $email = "gay@gmail.com";
    $senha_hash = "321";
    $tipo = "2";
    $nome = "GelFacial";

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome);
?>