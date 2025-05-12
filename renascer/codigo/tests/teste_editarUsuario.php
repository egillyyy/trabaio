<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    

    $email = "editaesseusuario@gmail.com";
    $senha_hash = "321";
    $tipo = "2";
    $nome = "bbbb";
    $telefone = "62 99008888";
    $cpf = "111.467.777-00";
    $idusuario = "2";

    editarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone, $cpf, $idusuario);

?>
