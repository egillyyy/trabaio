<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";


    // Usuário 1
    $email = "ana.silva@gmail.com";
    $senha_hash = "senha123";
    $tipo = "2";
    $nome = "Ana Silva";
    $telefone = "11 999999999";
    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);

    // Usuário 2
    $email = "lucas.moura@gmail.com";
    $senha_hash = "abc321";
    $tipo = "1";
    $nome = "Lucas Moura";
    $telefone = "21 988888888";
    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);

    // Usuário 3
    $email = "carla.oliveira@gmail.com";
    $senha_hash = "123456";
    $tipo = "2";
    $nome = "Carla Oliveira";
    $telefone = "31 977777777";
    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);

    // Usuário 4
    $email = "ricardo.souza@gmail.com";
    $senha_hash = "teste321";
    $tipo = "1";
    $nome = "Ricardo Souza";
    $telefone = "41 966666666";
    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);

    // Usuário 5
    $email = "maria.lima@gmail.com";
    $senha_hash = "maria321";
    $tipo = "2";
    $nome = "Maria Lima";
    $telefone = "51 955555555";
    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);

?>

    salvarUsuario($conexao, $email, $senha_hash, $tipo, $nome, $telefone);
?>