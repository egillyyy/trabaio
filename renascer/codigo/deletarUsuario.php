<?php
require_once "conexao.php";
require_once "funcoes.php";

    $id = $_GET['id'];


    // tenta deletar
    if (deletarUsuario($conexao, $id)) {
    echo "Usuário excluído com sucesso!";
        } else {
    echo "Erro ao excluir Usuário.";
    }
    ?>
<br><br>
<a href="../public/listarUsuarios.php">Voltar para lista</a>

