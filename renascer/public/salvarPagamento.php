<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$valor = $_POST["valor"];
$forma = $_POST["forma"];
$descricao = $_POST["descricao"];
$idagendamento = $_POST["idagendamento"];

// Função que você deve ter no funcoes.php
salvarPagamento($conexao, $valor, $forma, $descricao, $idagendamento);

// Depois de salvar, volta pra listagem
header("Location: listarPagamento.php");
?>