<?php
require_once "../../codigo/conexao.php";
require_once "../../codigo/funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- link para destrui o carrinho e simular um novo início -->
    <a href="destruir_carrinho.php">destruir carrinho</a>

    <!-- ver serviços que podem ser adicionados -->
    <form action="adicionar.php" method="POST">
        <h2>Listagem de Serviços</h2>

        <ul>
            <?php
            $lista_servicos = listarServico($conexao);
            foreach ($lista_servicos as $produto):
            ?>
                <li>
                    <input type="checkbox" name="idproduto[]" value="<?php echo $produto['idproduto'] ?>"> R$ <span><?php echo $produto['preco_venda']; ?></span> -- <?php echo $produto['nome']; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <input type="submit" value="Adicionar selecionados ao carrinho">
    </form>

    <a href="carrinho.php">Ver carrinho</a> <br>
</body>

</html>
