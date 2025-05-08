<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    

    $email = "Rodandinho@gmail.com";
    $senha_hash = "4567";
    $tipo = "1";
    $nome = "aaaa";
    $telefone = "62 99009571";
    $cpf = "000.467.666-00";
    $idusuario = "1";

    editarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone, $cpf, $idusuario);

?>
