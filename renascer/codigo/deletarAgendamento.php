<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // pega o ID da URL

    if (deletarAgendamento($conexao, $id)) {
        // Se deletou com sucesso, volta pra lista
        header("Location: ../paginas/agendamento.php?msg=deletado");
        exit;
    } else {
        echo "Erro ao deletar o agendamento.";
    }
} else {
    echo "ID não informado.";
}
