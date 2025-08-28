<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$email = $usuario['email'];
$senha_hash = $usuario['senha'];
$nome = $usuario['nome'];
$telefone = $usuario['telefone'];
// $nome = $_POST['nome'];
// $cpf = $_POST['cpf'];
// $endereco = $_POST['endereco'];

if ($id == 0) {
   salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);
} else {
    editarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone, $idusuario);
}

header("Location: listarUsuarios.php");