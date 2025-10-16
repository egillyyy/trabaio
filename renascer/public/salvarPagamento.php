<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

// $id = $_GET['id'];
$valor = $_POST['valor'];
$forma = $_POST['forma_pagamento'];
$descricao = $_POST['descricao'];
$tb_agendamento_idagendamento = $_POST['idagendamento'];


// Função que você deve ter no funcoes.php
salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento);

// Depois de salvar, volta pra listagem
header("Location: listarPagamentos.php");
?>