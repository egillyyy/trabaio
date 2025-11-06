<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

// $id = $_GET['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];

salvarUsuario($conexao, $email, $senha, $tipo, $nome, $telefone);

header("Location: home.php");
?>