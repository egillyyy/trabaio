<?php
require_once "conexao.php";
require_once "funcoes.php";

    $id = $_GET['id'];


    // tenta deletar
    if (deletarServico($conexao, $id)) {
        echo "Serviço excluído com sucesso!";

    } else {
        echo "Erro ao excluir o Serviço.";
    }
