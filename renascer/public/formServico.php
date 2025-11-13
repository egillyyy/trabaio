<?php
    require_once "../codigo/verificarLogado.php";
    $tipo = $_SESSION['tipo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Serviço</title>
</head>

<body>
    <h1 class="selecionarS">Selecione um serviço</h1>
    <?php

    require_once "../codigo/conexao.php";
    require_once "../codigo/funcoes.php";

    $tipo_servico = $_GET['tipo_servico'];
    $servicos = listarServico($conexao, $tipo_servico);

    if ($servicos && count($servicos) > 0) {
        echo '<div class="container mt-4">';
        echo '<div class="row justify-content-center">';

        foreach ($servicos as $servico) {
            echo '
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">' . $servico["tipo_servico"] . '</h5>
                </div>
                <div class="card-body">
                <img src="./fotos_servico/' . $servico["foto"] . '" alt="Imagem do serviço"
                 class="img-fluid rounded mb-3" style="max-height:200px; object-fit:cover;">
                   <p class="card-text">
                        <strong>Descrição:</strong> ' . $servico["descricao_servico"] . '<br>
                        <strong>Preço:</strong> R$ ' . $servico["preco_servico"] . '
                    </p> 
                    <a href="formAgendamento.php?id_servico=' . $servico["idservico"] . '" class="btn btn-dark w-100">
                        Selecionar
                    </a>
                </div>
            </div>
        </div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo "<p style='text-align:center;'>Nenhum serviço encontrado.</p>";
    }

    ?>
</body>
</html>