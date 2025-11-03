<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $apagou = deletarPagamento($conexao, $id);

    if ($apagou) {
        echo "Pagamento excluído com sucesso!";
    } else {
        echo "Erro ao excluir pagamento.";
    }
} else {
    echo "ID não informado.";
}
?>
<br><br>
<a href="../public/listarPagamentos.php">Voltar para lista</a>
