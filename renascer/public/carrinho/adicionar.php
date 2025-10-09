<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (!empty($_POST['idservico'])) {
    $selecionados = $_POST['idservico'];

    foreach ($selecionados as $id) {
        $servico = $_POST['servico'][$id];

        if ($servico < 1) {
            $servico = 1;
        }

        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] += $servico;
        } else {
            $_SESSION['carrinho'][$id] = $servico;
        }
    }
}

header("Location: carrinho.php");
exit;
