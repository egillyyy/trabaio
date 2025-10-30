<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";


$valor = $_POST['valor'];
$forma = $_POST['forma_pagamento'];
$descricao = $_POST['descricao'] ?? '';
$tb_agendamento_idagendamento = $_POST['idagendamento'];

if (salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento)) {
    echo "<script>alert('Pagamento realizado com sucesso!'); window.location.href='realizarPagamento.php';</script>";
} else {
    echo "Erro ao salvar pagamento: " . mysqli_error($conexao);
}
?>