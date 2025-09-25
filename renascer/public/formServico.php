<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css"> <!-- seu CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Serviço</title>
</head>
<body>

<h1 style="text-align:center; margin:20px;">Selecionar Serviço</h1>

<?php
    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $tipo_servico = $_GET['tipo_servico'];

    echo $tipo_servico;

    $servicos = listarServico($conexao);
    // $servicos = listarServico($conexao, $tipo_servico);

    print_r($servicos);
?>

</body>
</html>
