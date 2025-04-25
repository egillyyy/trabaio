<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $servico = "";
    $preco = "";
    $horario_disponivel = "";

    salvarServico($conexao, $servico, $preco, $horario_disponivel);
?>