<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $tipo = "1";
    $email = "Ian@gmail.com";
    $nome = "Ian";
    $senha_hash = "123jhi@23";;

    salvarUsuario($conexao, $senha_hash, $tipo, $email, $nome);
?>