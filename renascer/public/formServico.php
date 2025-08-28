<!DOCTYPE html>
<html lang="en">
<head>
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

    <h1>Selecionar Serviço</h1>

    <form action="salvarServico.php" method="get">
        <select name="idservico">
            <?php foreach ($lista_servicos as $servico) { 
                $id = $servico['idservico'];
                $tipo = $servico['tipo_servico'];
                $preco = $servico['preco_servico'];
            ?>
                <option value="<?= $id ?>"><?= $tipo ?> - R$ <?= $preco ?></option>
            <?php } ?>
        </select>
    <br><br>
    <button type="submit">Salvar</button>
</form>
</body>
</html>