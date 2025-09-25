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
<?php
require_once "../codigo/conexao.php";
require_once "../codigo/funcoes.php";

$lista_servicos = listarServico($conexao);
?>

<h1 style="text-align:center; margin:20px;">Selecionar Serviço</h1>

<form action="salvarServico.php" method="get">

    <div class="caixa-servicos">
        <?php foreach ($lista_servicos as $servico) { 
            $id = $servico['idservico'];
            $tipo = $servico['tipo_servico'];
            $preco = $servico['preco_servico'];
 
        ?>
        <div class="card-servico">
            <input type="radio" name="idservico" value="<?= $id ?>" required>
            <p><?= $tipo ?></p>
            <p>R$ <?= $preco ?></p>
        </div>
        <?php } ?>
    </div>

    <div style="text-align:center; margin-top:20px;">
        <button type="submit">Salvar</button>
    </div>
</form>
</body>
</html>
