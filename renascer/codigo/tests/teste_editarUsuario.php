<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    

    $email = "editaesseusuario@gmail.com";
    $senha_hash = "321";
    $tipo = "2";
    $nome = "bbbb";
    $telefone = "62 99008888";
    $idusuario = "2";

    editarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone, $idusuario);

?>
