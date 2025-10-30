<?php
    session_start();
    if (!isset($_SESSION['logado'])) {
        header("Location: index.php");
    }

    // Verifica quem é o usuário (c, f ou g)
    $tipo = $_SESSION['tipo'];
?>