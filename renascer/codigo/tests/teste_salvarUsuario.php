<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    $email = "Ian@gmail.com";
    $senha_hash = "123jhi@23";
    $tipo = "1";
    $nome = "Ian";

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome);
?>