<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];

    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $valor = $_POST['valor'];
    $forma = $_POST['forma_pagamento'];
    $descricao = $_POST['descricao'] ?? '';
    $tb_agendamento_idagendamento = $_POST['idagendamento'];

    if (salvarPagamento($conexao, $valor, $forma, $descricao, $tb_agendamento_idagendamento)) {
        echo "<div class='alert alert-success text-center' style='font-size: 24px; color: white; padding: 20px;'>
                <strong>Pagamento realizado com sucesso!</strong>
              </div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erro ao salvar pagamento: " . mysqli_error($conexao) . "</div>";
    }

?>

<div class="text-center mt-4">
    <button></button>
    <a href="servicos.php" class="btn btn-dark w-100" id="teste1l">Voltar</a>
</div>
