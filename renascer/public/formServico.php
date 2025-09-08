<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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