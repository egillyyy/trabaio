<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$id = $_GET['id'];
$email = $usuario['email'];
$senha_hash = $usuario['senha'];
$nome = $usuario['nome'];
$telefone = $usuario['telefone'];

if ($id == 0) {
salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
} else {
    editarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone, $idusuario);
}

header("Location: listarUsuarios.php");
?>